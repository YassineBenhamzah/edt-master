<?php

namespace Database\Seeders;

use Database\Factories\AppeloffresFactory;
use Database\Factories\CautionFactory;
use Database\Factories\ClientFactory;
use Database\Factories\ContactFactory;
use Database\Factories\LaborcostFactory;
use Database\Factories\PersonelFactory;
use Database\Factories\ProjetFactory;
use Database\Factories\TaskFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserFactory::class
       ]);
       $this->call([
        AppeloffresFactory::class
       ]);
       $this->call([
        CautionFactory::class
       ]);
       $this->call([
        ClientFactory::class
        ]);
        $this->call([
            ContactFactory::class
       ]);
       $this->call([
        LaborcostFactory::class
       ]);
       $this->call([
        PersonelFactory::class
       ]);
       $this->call([
        ProjetFactory::class
       ]);
       $this->call([
        TaskFactory::class
       ]);
    }
}
