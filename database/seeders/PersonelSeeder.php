<?php

namespace Database\Seeders;

use App\Models\Personel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Personel::factory()
        ->count(10)
        ->create();
    }
}
