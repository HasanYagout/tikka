<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'slug' => $this->faker->slug,
            'icon' => $this->faker->imageUrl,
            'parent_id' => $this->faker->numberBetween(0, 9),
            'position' => $this->faker->numberBetween(0, 9),
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
            'home_status' => '1',
            'priority' => $this->faker->numberBetween(0, 9),
        ];
    }
}
