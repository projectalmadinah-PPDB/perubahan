<?php

namespace App\Console\Commands;

use App\Models\Payment;
use Illuminate\Console\Command;

class Expired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:expired';

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
    // Mendapatkan semua pembayaran yang memiliki status 'pending'
    $usersWithPendingPayments = Payment::where('status', 'pending')->get();

    // Mendapatkan tanggal sekarang
    $currentDate = now();

    // Loop melalui setiap pembayaran yang masih tertunda
        foreach ($usersWithPendingPayments as $payment) {
            // Mendapatkan tanggal pembayaran
            $paymentDate = $payment->created_at; // Ubah ini sesuai dengan kolom tanggal pembayaran Anda

            // Menghitung selisih waktu antara tanggal pembayaran dan tanggal sekarang dalam hari
            $daysDifference = $currentDate->diffInDays($paymentDate);

            // Jika sudah lewat 1 hari, maka update status pembayaran menjadi 'expired'
            if ($daysDifference >= 1) {
                $payment->update(['status' => 'expired']);
            }
        }
    }
}
