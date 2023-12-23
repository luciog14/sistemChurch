<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{

        user::create([
            'name' => 'Johnson Maldonado Sarmas.',
            'email' => 'otimal1765@gmail.com',
            'email_verified_at' => now(),
            'password' =>Hash::make('AdminSCH24*'),
            'fechaIngreso'=> now(),
            'estado'=> '1',
            'remember_token' => Str::random(10),
        ]);
        user::create([
            'name' => 'Tania Atiencia Bravo.',
            'email' => 'taniaatiencia@gmail.com',
            'email_verified_at' => now(),
            'password' =>Hash::make('Atin3cia24*'),
            'fechaIngreso'=> now(),
            'estado'=> '1',
            'remember_token' => Str::random(10),
        ]);
        user::create([
            'name' => 'Invitado',
            'email' => 'invitado@gmail.com',
            'email_verified_at' => now(),
            'password' =>Hash::make('inv12345*'),
            'fechaIngreso'=> now(),
            'estado'=> '1',
            'remember_token' => Str::random(10),
        ]);
    }
}
