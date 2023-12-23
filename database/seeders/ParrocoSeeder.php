<?php

namespace Database\Seeders;

use App\Models\Parroco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParrocoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        Parroco::factory()->count(5)->create();
    }
}
