<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\enlaces>
 */
class EnlacesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "id_pagina"=> $this->faker->numberBetween(1,10),
            "id_rol"=> $this->faker->numberBetween(1,10),
            "descripcion"=> $this->faker->sentence(),
        ];
    }
}
