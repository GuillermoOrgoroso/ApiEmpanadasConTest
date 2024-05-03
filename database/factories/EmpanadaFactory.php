<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmpanadaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word(),
            'tipo' => $this->faker->RandomElement(['Carne','pollo','vinagre','cactus','queso']),
            'precio' =>$this->faker->numberBetween(50,150),
            'cantidad' =>$this->faker->numberBetween(1,40)
        ];
    }
}
