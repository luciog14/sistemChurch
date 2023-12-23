<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Padrino>
 */
class PadrinoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'padrCedula'=>fake()->unixTime($max = 'now'),
            'padrNombre' =>fake()->firstName($gender ='male'),
            'padrApellido' =>fake()->lastName(),
            'padrTelefono'=>fake()->unixTime($max = 'now'),
            'padrDireccion'=>fake()->address(),
        ];
    }
}
