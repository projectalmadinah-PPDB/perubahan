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
            'notif_otp' => 'lorem ipsum dolor sit amet consect',
            'notif_pembayaran' => 'lorem ipsum dolor sit amet consect',
            'notif_lolos' => 'lorem ipsum dolor sit amet consect',
            'notif_gagal' => 'lorem ipsum dolor sit amet consect',
            'notif_info' => 'lorem ipsum dolor sit amet consect',
        ]);
    }
}
