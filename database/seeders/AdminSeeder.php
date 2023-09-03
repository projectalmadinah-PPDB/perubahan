<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'nomor' => '6282346739790',
            'password' => bcrypt('12345678'),
            'active' => 1,
            'role' => 'admin',
            'token' => rand(111111, 999999),
            'tanggal_lahir' => date('Y-m-d H:i:s'), // Ubah format tanggal di sini
            'jenis_kelamin' => 'Laki-Laki'
       ];

       User::create($user);
    }
}
