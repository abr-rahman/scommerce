<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryIds = \App\Models\Category::pluck('id')->toArray();
        $subCategoryIds = \App\Models\SubCategory::pluck('id')->toArray();
        $brandIds = \App\Models\Brand::pluck('id')->toArray();
        $userIds = \App\Models\User::pluck('id')->toArray();
        $tagIds = \App\Models\Tag::pluck('id')->toArray();
        return [
            'category_id' => $this->faker->randomElement($categoryIds),
            'sub_category_id' => $this->faker->randomElement($subCategoryIds),
            'brand_id' => $this->faker->randomElement($brandIds),
            'added_by' => $this->faker->randomElement($userIds),
            'tag_id' => $this->faker->randomElement($tagIds),
            'product_name' => $this->faker->word(),
            'color_code' => $this->faker->word(),
            'size' => $this->faker->word(),
            'regular_price' => $this->faker->randomFloat(2, 100, 5000),
            'discount_fixed' => $this->faker->randomFloat(2, 10, 500),
            'discount_percentage' => $this->faker->randomFloat(2, 10, 500),
            'slug' => $this->faker->slug(),
            'sku' => $this->faker->word(),
            'short_description' => $this->faker->paragraph(2),
            'long_description' => $this->faker->paragraph(3),
            'weight' => $this->faker->randomDigitNot(5),
            'dimensions' => $this->faker->word(2),
            'meterials' => $this->faker->randomElement(['cotton', 'oil', 'water']),
            'other_info' => $this->faker->paragraph(2),
            'product_image' => $this->faker->imageUrl(),
            'thumbnail_image' => $this->faker->imageUrl(),
            'status' => $this->faker->boolean(90),
        ];

    }
}
