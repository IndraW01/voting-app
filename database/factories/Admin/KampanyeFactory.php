<?php

namespace Database\Factories\Admin;

use App\Models\Admin\Calon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin\Kampanye>
 */
class KampanyeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'calon_id' => Calon::factory(),
            'visi' => collect(fake()->paragraphs(mt_rand(3, 5)))->map(function($value) {
                return '<p>'. $value .'</p>';
            })->implode(' '),
            'misi' => collect(fake()->sentences(mt_rand(4, 6)))->map(function($value) {
                return '<li>'. $value .'</li>';
            })->implode(' '),
        ];
    }
}
