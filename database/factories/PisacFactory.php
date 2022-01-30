<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PisacFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ime'=>$this->faker->firstName(),
           'prezime'=>$this->faker->lastName(),
           'godinaRodjenja'=>$this->faker->year()
        ];
    }
}
