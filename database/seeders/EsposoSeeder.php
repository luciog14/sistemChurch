<?php

namespace Database\Seeders;

use App\Models\Esposo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EsposoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        Esposo::factory()->count(5)->create();
    }
}
