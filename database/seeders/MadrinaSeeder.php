<?php

namespace Database\Seeders;

use App\Models\Madrina;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MadrinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        Madrina::factory()->count(5)->create();
    }
}
