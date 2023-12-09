<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $proIds = \App\Models\Product::pluck('id')->toArray();
        return [
            'name' => $this->faker->word(),
            'product_id' => $this->faker->randomElement($proIds),
            'email' => $this->faker->email(),
            'rating' => $this->faker->randomNumber([3,4,5]),
            'comment' => $this->faker->word(10),
            'status' => $this->faker->boolean(90),
        ];
    }
}
