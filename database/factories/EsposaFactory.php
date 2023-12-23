<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Esposa>
 */
class EsposaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array{
        return [
            'wifCedula'=>fake()->unixTime($max = 'now'),
            'wifNombre' =>fake()->firstName($gender ='female'),
            'wifApellido' =>fake()->lastName(),
            'wifEmail' =>fake()->freeEmail(),
            'wifTelefono'=>fake()->unixTime($max = 'now'),
            'wifDireccion'=>fake()->address(),
        ];
    }
}
