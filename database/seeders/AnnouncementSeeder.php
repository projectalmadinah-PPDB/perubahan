<?php

namespace Database\Seeders;

use App\Http\Middleware\User;
use App\Models\Announcement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // Announcement::create(
        //     [
        //         'title'   => 'Lakukan pembayaran untuk melanjutkan proses pendaftaran',
        //         'desc'    => '<ul><li>Siapkan uang sebesar 100.000 Rupiah</li><li>Memiliki Virtual Account</li><li>Ikuti panduan langkah proses pembayaran melalui IPaymu</li></ul>',
        //         'step'    => 1,
        //         'user_id' => 1
        //     ],
        // );
    }
}
