<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'gender' => fake()->word(),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->asciify(),
            'phone_number' => fake()->numerify(),
            'note' => fake()->asciify()
        ];
    }
}
