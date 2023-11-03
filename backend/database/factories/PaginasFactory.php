<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaginasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "url" => $this->faker->url(),
            "estado" => $this->faker->randomElement(['Permitido', 'Denegado']),
            "nombre" => $this->faker->firstName(),
            "descripcion" => $this->faker->sentence(),
            "icono"=> $this->faker->sentence(),
            "tipo"=> $this->faker->randomElement([1,2,3]),
            "habilitado"=> $this->faker->randomElements(["si", "no"]),
        ];
    }
}
