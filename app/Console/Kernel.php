<?php

namespace Myjob\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {
	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		\Myjob\Console\Commands\SendNotificationMails::class,
		\Myjob\Console\Commands\SyncLDAPStudents::class,
	];

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule $schedule
	 * @return void
	 */
	protected function schedule(Schedule $schedule) {
		// Synchronise student list with the LDAP
		$schedule->command('syncstudents')
			->weeklyOn(6, '4:00'); // 6 = Saturday

		// Send notification mails
		$schedule->command('sendnotificationmails --subscribed=instantly')
			->everyThirtyMinutes();
		$schedule->command('sendnotificationmails --subscribed=daily')
			->dailyAt('4:00');
		$schedule->command('sendnotificationmails --subscribed=weekly')
			->weeklyOn(0, '4:00'); // 0 = Sunday
	}
}
