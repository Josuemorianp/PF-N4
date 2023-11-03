<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\usuarios>
 */
class UsuariosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "id_persona"=> $this->faker->numberBetween(1,10),
            "usuario"=> $this->faker->userName(),
            "clave"=> $this->faker->password(),
            "fecha"=> $this->faker->date(),
            "id_rol"=> $this->faker->numberBetween(1, 3),
            "habilitado"=> $this->faker->randomElement(['si', 'no']),
        ];
    }
}