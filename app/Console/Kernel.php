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
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            // Ambil pengguna dengan status pembayaran "pending"
            $usersWithPendingPayments = Payment::where('status', 'pending')->get();
    
            foreach ($usersWithPendingPayments as $payment) {
                // Kirim pesan WhatsApp kepada pengguna
                $phoneNumber = $payment->user->nomor; // Gantilah dengan kolom yang sesuai dalam tabel pengguna
                $message = "Halo " . $payment->user->name . ",\n\n"
                . "Apakah kamu yakin tidak ingin melanjutkan pembayaran kamu? Jika tidak, kami akan membatalkan proses pembayaran kamu.\n\n"
                . "Jika kamu ingin melanjutkan, silakan klik link berikut: .\n\n"
                . "$payment->link"; // Sesuaikan dengan pesan yang ingin Anda kirim
                // Gunakan API WhatsApp yang telah Anda konfigurasi untuk mengirim pesan
                $this->send_message($phoneNumber,$message);
                // Anda harus mengimplementasikan logika pengiriman pesan WhatsApp di sini.
            }
        })->hourly(12);
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
