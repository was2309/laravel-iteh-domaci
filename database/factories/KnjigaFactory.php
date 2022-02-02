<?php

namespace Database\Factories;

use App\Models\Pisac;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class KnjigaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'naslov'=>$this->faker->word(),
            'izdavac'=>$this->faker->word(),
            'user_id'=>User::factory(),
            'pisac_id'=>Pisac::factory(),
            'kategorija_id'=>$this->faker->numberBetween(1,9),
            'ISBN'=>$this->faker->regexify('([1-9][1-9][1-9][1-9]-){4}')
        ];
    }
}
