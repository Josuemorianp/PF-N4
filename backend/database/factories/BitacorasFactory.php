<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\bitacoras>
 */
class BitacorasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "bitacora"=> $this->faker->randomElement(['Ingreso', 'Salidas', 'Intento de Conexión']),
            "fecha"=> $this->faker->date(),
            "hora"=> $this->faker->time(),
            "ip"=> $this->faker->ipv4(),
            "so"=> $this->faker->userAgent(),
            "navegador"=> $this->faker->userAgent(),  
        ];
    }
}
