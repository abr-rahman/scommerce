<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dealership>
 */
class DealershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'business_name' => $this->faker->word(3),
            'business_address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'nid_number' => $this->faker->randomNumber(),
            'bin_number' => $this->faker->randomNumber(),
            'trade_license_number' => $this->faker->randomNumber(),
            'trade_license_photo' => $this->faker->imageUrl(),
            'profile_photo' => $this->faker->imageUrl(),
            'nid_photo' => $this->faker->imageUrl(),
            'tin_photo' => $this->faker->imageUrl(),
            'tin_number' => $this->faker->randomNumber(),
            'attachment' => $this->faker->imageUrl(),
            'status' => $this->faker->boolean(90),
            'others' => $this->faker->word(3),
            'p_address' => $this->faker->address(),
        ];
    }
}
