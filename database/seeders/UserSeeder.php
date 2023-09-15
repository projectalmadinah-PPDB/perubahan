<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    protected $model = User::class;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(25)->create();
    }
}
