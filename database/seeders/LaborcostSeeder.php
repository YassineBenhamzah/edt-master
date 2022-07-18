<?php

namespace Database\Seeders;

use App\Models\laborcost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaborcostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        laborcost::factory()
        ->count(10)
        ->create();
    }
}
