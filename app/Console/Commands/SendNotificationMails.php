<?php

namespace Myjob\Console\Commands;

use Illuminate\Console\Command;

use Myjob\Models\User;
use Myjob\Models\Ad;
use Myjob\Models\Category;

use Mail;
use Log;

class SendNotificationMails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendnotificationmails {--subscribed= : one of instantly, daily, weekly}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification emails. --subscribed=instantly,
        daily or weekly should be specified. Emails are sent to
        users that subscribed to corresponding notification list.';

    /**
     * The possible options for --subscribed
     */
    private $subscribedOptions = ['instantly', 'daily', 'weekly'];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $subscribed = $this->option('subscribed');

        if (!in_array($subscribed, $this->subscribedOptions)) {
            echo "Please specify option --subscribed with one of the following: " . implode(", ", $this->subscribedOptions) . "\n";
            return;
        }

        switch ($subscribed) {
            case 'instantly':
                $users = User::where('notifications_instant', 1);
                $ads = Ad::withCategories()->where('validated', 1)->where('validated_at', '>=', formatDate(strtotime("-30 minutes")));
                break;

            case 'daily':
                $users = User::where('notifications_day', 1);
                $ads = Ad::withCategories()->where('validated', 1)->where('validated_at', '>=', formatDate(strtotime("-1 day")));
                break;

            case 'weekly':
                $users = User::where('notifications_week', 1);
                $ads = Ad::withCategories()->where('validated', 1)->where('validated_at', '>=', formatDate(strtotime("-1 week")));
                break;

            default:
                /* Impossible state */
                Log::error("Impossible state during command sendnotificationmails");
                break;
        }

        /* Fetch new ads if any */
        $ads = $ads->get();
        $categoryMappings = Category::get_id_name_mapping();

        if (count($ads) > 0) {

            Log::info('email notifications (' . $subscribed . '): start sending ' . count($ads) . ' new ads');
            /* Process users by chunks to send notification mails with new ads*/
            $users->chunk(200, function($users) use (&$ads, &$categoryMappings) {

                foreach ($users as $user) {
                    /* Only send to user with id == 1, for testing purposes.
                    We're starting to populate the DB with real users and
                    don't want to bother them. TODO when it's ready, remove the
                    "if" */
                    if ($user->user_id == 1) {
                        Mail::send('emails.ads', ['user' => $user, 'ads' => $ads, 'category_names' => $categoryMappings], function ($m) use (&$user) {
                            $m->to($user->email, $user->first_name)->subject(trans('mails.notifications.newjobs'));
                        });
                    }
                }
            });
            Log::info('email notifications (' . $subscribed . '): terminate sending ' . count($ads) . ' new ads');

        } else {
            Log::info('email notifications (' . $subscribed . '): no new ad');
        }
    }
}
