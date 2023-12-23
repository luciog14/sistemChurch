<?php

namespace Database\Seeders;

use App\Models\Madre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MadreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        Madre::factory()->count(5)->create();
    }
}
