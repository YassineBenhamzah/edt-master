<?php

namespace Database\Seeders;

use App\Models\Projet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Projet::factory()
        ->count(10)
        ->create();
    }
}
