<?php

namespace Database\Seeders;

use App\Models\Esposa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EsposaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Esposa::factory()->count(5)->create();
    }
}
