<?php

namespace Database\Seeders;

use App\Models\Padrino;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PadrinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        Padrino::factory()->count(5)->create();
    }
}
