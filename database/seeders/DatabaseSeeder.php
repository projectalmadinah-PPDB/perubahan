<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Announcement;
use App\Models\General;
use App\Models\Generasi;
use App\Models\Notify;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Illuminate\Support\Facades\Auth;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        $this->call([
            AdminSeeder::class,
            UserSeeder::class,
            GenerasiSeeder::class,
            StudentSeeder::class,
            QuestionSeeder::class,
        ]);

        Generasi::create([
            'generasi' => date("Y"),
            'status' => 'on',
            'start_at' => '2023-09-12',
            'end_at' => '2023-09-13'
        ]);
        General::create([
            'school_name' => 'Ar-Romusha',
            'school_logo' => 'logo\9ZvJ5Vsa1yncP9zqNcoaeI98mIjccgA0zvF5WcsS.svg',
            'school_phone' => '123456789',
            'school_email' => 'arrhomusha@mail.com',
            'school_address' => fake()->address,
            'social_media' => '',
            'desc' => fake()->paragraph()
        ]);

        Notify::create([
            'notif_otp' => 'Halo Kami Dari Pondok Al-Romusa , Kamu Telah Melakukan Pendaftaran Untuk Bisa Menggunakan Akun Silahkan Masukkan Kode Otp Berikut ',
            'notif_pembayaran' => 'Halo Kami Dari Pondok Al-Romusa , Kamu Telah di Verifikasi Silahkan Melakukan Pembayaran Di Link Berikut ',
            'notif_lolos' => 'Halo Kami Dari Pondok Al-Romusa , Kamu Di nyatakan Lulus Seleksi Awal Silahkan Menunggu Informasi Selanjutnya Terima Kasih ',
            'notif_gagal' => 'Halo Kami Dari Pondok Al-Romusa , Kamu Di nyatakan Gagal Seleksi Penyebabnya mungkin data pribadi anda tidak lengkap Terima kasih',
            'notif_info' => 'Halo Kami Dari Pondok Al-Romusa , Kamu Harus Bersiap - siap Untuk Tes Wawancara Pada Tanggal ',
            'notif_wawancara' => 'Halo Kami Dari Pondok Al-Romusa , Kamu Berhasil Melanjutkan Ke Tahap Wawancara Silahkan Mengggu Waktu Dan Link Dari Administrator ',
            'notif_login' => 'Halo Kami Dari Pondok Al-Romusa , Kamu Telah Berhasil Login Ke Halaman Pendaftaran Siswa Baru Silahkan Membayar Uang pendaftaran Dengan Menekan Tombol Yang Berada Di Halaman Pendaftaran / Disini ',
            'notif_mengisi_pribadi' => 'Halo Kami Dari Pondok Al-Romusa , Kamu Telah Melengkapi Data Pribadi Dan Data Orang Tua Silahkan Melengkapi Data Document Anda Dengan Mengiapkan Document Dalam File Pdf Seperti Ijazah,Akte,KK,Rapor Terima Kasih',
            'notif_melengkapi' => 'Halo Kami Dari Pondok Al-Romusa , Kamu Telah Melengkapi Semua Data Pribadi Kamu Silahkan Menunggu Pesan Pengumuman Test Dari Admin Terima kasih'
        ]);

    }
}
