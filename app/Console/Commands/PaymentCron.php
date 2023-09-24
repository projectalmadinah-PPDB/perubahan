<?php

namespace App\Console\Commands;

use App\Models\Payment;
use App\Traits\Fonnte;
use Illuminate\Console\Command;

class PaymentCron extends Command
{
    use Fonnte;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:payment-cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
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
    }
}
