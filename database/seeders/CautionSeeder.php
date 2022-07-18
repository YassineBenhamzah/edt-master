<?php

namespace Database\Seeders;

use App\Models\Caution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CautionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Caution::factory()
        ->count(10)
        ->create();
    }
}
