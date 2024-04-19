<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'beds' => fake()->numberBetween(1, 5),
            'baths' => fake()->numberBetween(1, 3),
            'area' => fake()->numberBetween(20, 400),
            'city' => fake()->city(),
            'code' => fake()->postcode(),
            'street' => fake()->streetName(),
            'street_nr' => fake()->numberBetween(10, 100),
            'price' => fake()->numberBetween(10_000, 1_000_000), // _ is used as a separator for thousands in PHP 7.4+

        ];
    }
}
