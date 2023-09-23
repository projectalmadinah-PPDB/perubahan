<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'birthplace'         => $this->faker->city(),
            'nik'                => $this->faker->randomNumber(6, true) . rand(010100,311299) . $this->faker->unique()->randomNumber(4, true),
            'nisn'               => rand(000,999) . $this->faker->unique()->randomNumber(7, true),
            'hobby'              => $this->faker->word(),
            'ambition'           => $this->faker->sentence(),
            'last_graduate'      => $this->faker->randomElement(['TK', 'SD', 'SMP', 'SMA']),
            'old_school'         => rand(1,20) . ' Negeri ' . $this->faker->city(),
            'organization_exp'   => $this->faker->sentence(),
            'address'            => $this->faker->address(),
            'status'             => $this->faker->randomElement(['Belum', 'Verifikasi', 'TidakSah'])
        ];
    }
}
