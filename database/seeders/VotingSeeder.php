<?php

namespace Database\Seeders;

use App\Models\Admin\Voting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VotingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Voting::factory()->count(10)->create();
    }
}
