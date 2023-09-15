<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'                 => fake()->name(),
            'email'                => fake()->unique()->safeEmail(),
            'nomor'                => fake()->unique()->phoneNumber(),
            'jenis_kelamin'        => fake()->randomElement(['Laki-Laki', 'Perempuan']),
            'tanggal_lahir'        => fake()->date(),
            'password'             => bcrypt('password'), // password
            'role'                 => 'user',
            'token'                => fake()->unique()->randomNumber(6, true),
            'active'               => 1,
            
            'email_verified_at'    => now(),
            'remember_token'       => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
