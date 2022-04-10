<?php

namespace App\Console;

use App\Console\Commands\HelloCommand;
use App\Console\Commands\SampleCommand;
use App\Console\Commands\SendOrdersCommand;
use Carbon\CarbonImmutable;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command(SampleCommand::class)
            ->description('サンプルタスク')
            ->everyMinute();

        $schedule->call(function () {
            return 0;
        })->description('callメソッド')
            ->everyMinute();

        $schedule->exec('app:sample')
            ->description('execメソッド')
            ->everyMinute();

        $schedule->command(HelloCommand::class)->cron('* * * * *');

        $schedule->command(
            SendOrdersCommand::class,
            [CarbonImmutable::yesterday()->format('Ymd')]
        )
            ->dailyAt('05:00')
            ->description('購入情報送信')
            ->withoutOverlapping();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
