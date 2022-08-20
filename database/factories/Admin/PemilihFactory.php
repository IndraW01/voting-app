<?php

namespace Database\Factories\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Pemilih>
 */
class PemilihFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $angkatan = [2019, 2020, 2021, 2022];
        $kelas = ['A', 'B', 'C'];

        return [
            'user_id' => User::factory(),
            'nama' => fake()->name(),
            'nim' => fake()->unique()->bothify('##1503####'),
            'angkatan' => fake()->randomElement($angkatan),
            'kelas' => fake()->randomElement($kelas),
            'foto_pemilih' => fake()->imageUrl(400, 400, 'person')
        ];
    }
}
