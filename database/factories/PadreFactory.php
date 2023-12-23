<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Padre>
 */
class PadreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'padCedPas'=>fake()->unixTime($max = 'now'),
            'padNombre' =>fake()->name(),
            'padApellido' =>fake()->lastName(),
            'padEmail' =>fake()->freeEmail(),
            'padTelefono'=>fake()->unixTime($max = 'now'),
            'padDireccion'=>fake()->address(),
            'padNacionalidad' =>fake()->country(),
        ];
    }
}
