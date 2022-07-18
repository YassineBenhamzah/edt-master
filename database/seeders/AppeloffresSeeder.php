<?php

namespace Database\Seeders;

use App\Models\Appeloffres;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppeloffresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Appeloffres::factory()
        ->count(10)
        ->create();
    }
}
