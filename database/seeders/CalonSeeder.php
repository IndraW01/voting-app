<?php

namespace Database\Seeders;

use App\Models\Admin\Calon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CalonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Calon::factory()->count(5)->create();
    }
}
