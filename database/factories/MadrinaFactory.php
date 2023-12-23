<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Madrina>
 */
class MadrinaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array{
        return [
            'madrCedula'=>fake()->unixTime($max = 'now'),
            'madrNombre' =>fake()->firstName($gender ='female'),
            'madrApellido' =>fake()->lastName(),
            'madrTelefono'=>fake()->unixTime($max = 'now'),
            'madrDireccion'=>fake()->address(),
        ];
    }
}
