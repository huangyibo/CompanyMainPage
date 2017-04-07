<?php

namespace CompanyMainPage\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\Inspire::class,

        Commands\ESTReinstallCommand::class,
        Commands\ESTInstallCommand::class,
        Commands\ESTDatabaseResetCommand::class,
        Commands\ESTDatabaseNukeCommand::class,
        Commands\ESTInitRBAC::class,

        Commands\SyncUserActivedTime::class,
        Commands\SendIssueToUser::class,

        Commands\TopicToLinkCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
                 ->hourly();

        $schedule->command('backup:run --only-db')->cron('0 */4 * * * *');
        $schedule->command('backup:clean')->daily()->at('00:10');
        $schedule->command('basic:sync-user-actived-time')->everyTenMinutes();
    }
}
