<?php

namespace Database\Factories\Product;

use Illuminate\Database\Eloquent\Factories\Factory;
use Models\Product\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;
 
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(4),
            "category_id" => fake()->numberBetween(1,5),
            "line_id" => fake()->numberBetween(1,5),
            "brand_id" => fake()->numberBetween(1,5),
            "review" => fake()->text,
            "usage" => fake()->text,
            "description" => fake()->text,
            "image" => fake()->randomElement(['1.jpg', '2.jpg','3.jpg']),
        ];
    }
}
