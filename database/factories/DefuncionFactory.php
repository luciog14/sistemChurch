<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Unique;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Defuncion>
 */
class DefuncionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'defCedula'=>fake()->unixTime($max = 'now'),
            'defNombre'=>fake()->name,
            'defApellido'=>fake()->Lastname,
            'defRegistro'=>fake()->name,
        ];
    }
}
