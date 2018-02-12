<?php

namespace App\Console;

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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        /*$schedule->call(function () {
            file_put_contents('/tmp/crontest.log', date('Y-m-d H:i:s') . ' hello'  . PHP_EOL, FILE_APPEND);
        })->everyMinute()->timezone('Asia/Shanghai');

        $schedule->call(function () {
            file_put_contents('/tmp/crontest2.log', date('Y-m-d H:i:s') . ' world'  . PHP_EOL, FILE_APPEND);
        })->everyFiveMinutes()->timezone('Asia/Shanghai');*/
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
