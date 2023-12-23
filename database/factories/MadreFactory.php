<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Madre>
 */
class MadreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'madCedPas'=>fake()->unixTime($max = 'now'),
            'madNombre' =>fake()->firstName($gender ='female'),
            'madApellido' =>fake()->lastName(),
            'madEmail' =>fake()->freeEmail(),
            'madTelefono'=>fake()->unixTime($max = 'now'),
            'madDireccion'=>fake()->address(),
            'madNacionalidad' =>fake()->country(),
        ];
    }
}
