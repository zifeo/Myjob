<?php

namespace Myjob\Console\Commands;

use Illuminate\Console\Command;
use Myjob\Agepinfo\LDAP;

class UsersUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'usersupdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

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
        $u = LDAP::getStudentBySciper(223744);

        if ($u) {
            echo $u;
        } else {
            echo "Student not found / Not a student.";
        }
    }
}
