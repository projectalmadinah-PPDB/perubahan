<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tutor = [
            'title' => 'Panduan Melakukan Pembayaran dengan IPaymu',
            'desc' => '
            
            ',
            'image' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fipaymu.com%2F&psig=AOvVaw224OZlUpuyDlUz-ZHLJVnl&ust=1695994632534000&source=images&cd=vfe&opi=89978449&ved=0CBEQjRxqFwoTCMjwvMy2zYEDFQAAAAAdAAAAABAE',
            'slug' => 'panduan-melakukan-pembayaran-dengan-ipaymu',
            'user_id' => User::first()->id,
            'category_id' => NULL,
        ];

        Article::create($tutor);
    }
}
