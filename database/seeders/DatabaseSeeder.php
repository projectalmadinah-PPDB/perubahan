<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\General;
use App\Models\Notify;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;

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
            AdminSeeder::class
        ]);

        General::create([
            'school_name' => 'Ar-Romusha',
            'school_logo' => 'logo\9ZvJ5Vsa1yncP9zqNcoaeI98mIjccgA0zvF5WcsS.svg',
            'school_phone' => '123456789',
            'school_email' => 'arrhomusha@mail.com',
            'school_address' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime ad recusandae asperiores voluptatum autem eaque voluptatem eius unde aut aspernatur.',
            'social_media' => '',
            'desc' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime ad recusandae asperiores voluptatum autem eaque voluptatem eius unde aut aspernatur.'
        ]);

        Notify::create([
            'notif_otp' => 'Halo Kami Dari Pondok Al-Romusa , Kamu Telah Melakukan Pendaftaran Untuk Bisa Menggunakan Akun Silahkan Masukkan Kode Otp Berikut ',
            'notif_pembayaran' => 'Halo Kami Dari Pondok Al-Romusa , Kamu Telah di Verifikasi Silahkan Melakukan Pembayaran Di Link Berikut ',
            'notif_lolos' => 'Halo Kami Dari Pondok Al-Romusa , Kamu Di nyatakan Lulus Seleksi Awal Silahkan Menunggu Informasi Selanjutnya Terima Kasih',
            'notif_gagal' => 'Halo Kami Dari Pondok Al-Romusa , Kamu Di nyatakan Gagal Seleksi Penyebabnya mungkin data pribadi anda tidak lengkap Terima kasih',
            'notif_info' => 'Halo Kami Dari Pondok Al-Romusa , Kamu Harus Bersiap - siap Untuk Tes Wawancara Pada Tanggal ',
            'notif_wawancara' => 'Halo Kami Dari Pondok Al-Romusa , Kamu Berhasil Melanjutkan Ke Tahap Wawancara Silahkan Mengggu Waktu Dan Link Dari Administrator',
            'notif_tidak_sah' => 'Halo Kami Dari Pondok Al-Romusa , Data Pribadi kamu Terlihat Palsu Atau Kamu Di Anggap Tidak Lulus Terima Kasih',
            'notif_verify' => 'Halo Kami Dari Pondok Al-Romusa , Akun Kamu Sudah Di Verifikasi Sama Penyelenggara Silahkan Masukkan Data Diri Anda Terima Kasih',
            'notif_belum_verify' => 'Halo Kami Dari Pondok Al-Romusa , Kamu Telah Berhasil Login Silahkan Menunggu Jawaban Dari Penyelenggara PPDB Pondok Terima Kasih',
            'notif_gagal_otp' => 'Halo Kami Dari Pondok Al-Romusa , Pesan Otp Kamu Gagal Di Kirim silahkan Hubungi 082346739790'
        ]);
    }
}
