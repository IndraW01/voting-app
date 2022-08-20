<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Calon;
use App\Models\Admin\Pemilih;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Voting>
 */
class VotingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $pemilih = Pemilih::limit(10)->pluck('id');
        $calon = Calon::pluck('id');

        return [
            'pemilih_id' => fake()->unique()->randomElement($pemilih),
            'calon_id' => fake()->randomElement($calon),
        ];
    }
}
