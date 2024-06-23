<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FrontUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                 'org_id' => fake()->uuid(),
                   'name' => fake()->name(),
                'website' => fake()->url(),
                'country' => fake()->company(),
            'description' => fake()->sentence(),
                'founded' => fake()->year('now'),
               'industry' => fake()->company(),
               'employee' => fake()->numberBetween(1, 10000),
        ];
    }
}
