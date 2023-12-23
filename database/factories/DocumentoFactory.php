<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use NunoMaduro\Collision\Adapters\Phpunit\State;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Documento>
 */
class DocumentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'docNumero'=>fake()->unixTime($max = 'now'),
            'docFechEmision'=>fake()->date($format = 'Y-m-d', $max = 'now'),
            'docRemit'=>fake()->name(),
            'docDest'=>fake()->name(),
            'docAsunto'=>fake()->state(),
            'docEscan'=>fake()->imageUrl($width = 640, $height = 480),
            'docLibro'=>fake()->unixTime($max='now'),
        ];
    }
}
