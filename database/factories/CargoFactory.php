<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CargoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "description" => $this->faker->country(),
            "type"        => $this->faker->countryCode(),
            "hs_code"     => $this->faker->numberBetween(10000000, 90000000),
            "length"      => $this->faker->numberBetween(1, 100),
            "height"      => $this->faker->numberBetween(1, 100),
            "depth"       => $this->faker->numberBetween(1, 100),
            "weight"      => $this->faker->numberBetween(1, 100),
        ];
    }
}
