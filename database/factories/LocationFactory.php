<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"    => $this->faker->company(),
            "country" => $this->faker->country(),
            "country_code" => $this->faker->countryCode(),
            "city"    => $this->faker->city(),
            "address" => $this->faker->address(),
        ];
    }
}
