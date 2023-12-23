<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Esposo>
 */
class EsposoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [            
            'husCedula'=>fake()->unixTime($max = 'now'),
            'husNombre' =>fake()->firstName($gender ='male'),
            'husApellido' =>fake()->lastName(),
            'husEmail' =>fake()->freeEmail(),
            'husTelefono'=>fake()->unixTime($max = 'now'),
            'husDireccion'=>fake()->address(),
            
        ];
    }
}
