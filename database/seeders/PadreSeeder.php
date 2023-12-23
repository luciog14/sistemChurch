<?php

namespace Database\Seeders;

use App\Models\Padre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PadreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
       padre::factory()->count(5)->create();
    }
}
