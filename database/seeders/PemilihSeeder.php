<?php

namespace Database\Seeders;

use App\Models\Admin\Pemilih;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemilihSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Pemilih::factory()->count(20)->create();
    }
}
