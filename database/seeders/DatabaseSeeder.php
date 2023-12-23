<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Esposa;
use App\Models\Madre;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $this->call([
            PadreSeeder::class,
            DocumentoSeeder::class,
            DefuncionSeeder::class,
            EsposaSeeder::class,
            EsposoSeeder::class,
            MadrinaSeeder::class,
            PadrinoSeeder::class,
            ParrocoSeeder::class,
            MadreSeeder::class,
            UserSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
