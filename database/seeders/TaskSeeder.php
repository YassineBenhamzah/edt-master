<?php

namespace Database\Seeders;

use App\Models\task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        task::factory()
        ->count(10)
        ->create();
    }
}
