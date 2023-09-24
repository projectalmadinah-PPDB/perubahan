<?php

namespace App\Console;

use App\Models\Payment;
use App\Traits\Fonnte;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    use Fonnte;
    protected $commands = [
        Commands\PaymentCron::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        $schedule->command("app:payment-cron")->everySecond();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
