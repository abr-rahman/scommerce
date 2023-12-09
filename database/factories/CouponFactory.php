<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->word(),
            'categories' => $this->faker->word(),
            'valid_from' => $this->faker->date('Y-m-d'),
            'valid_to' => $this->faker->date('Y-m-d'),
            'fixed_amount' => $this->faker->randomNumber([20]),
            'percent_amount' => $this->faker->randomNumber([5]),
            'minimum_order' => $this->faker->randomNumber([10]),
            'use_limit' => $this->faker->randomNumber([50]),
            'status' => $this->faker->boolean(90),
        ];
    }
}
