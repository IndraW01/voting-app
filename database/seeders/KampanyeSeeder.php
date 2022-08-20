<?php

namespace Database\Seeders;

use App\Models\Admin\Kampanye;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KampanyeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Kampanye::factory(5)->create();
    }
}
