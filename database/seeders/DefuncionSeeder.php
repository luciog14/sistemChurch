<?php

namespace Database\Seeders;

use App\Models\Defuncion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefuncionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Defuncion::factory()->count(5)->create();
    }
}
