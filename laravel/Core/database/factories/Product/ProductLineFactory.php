<?php

namespace Database\Factories\Product;

use Illuminate\Database\Eloquent\Factories\Factory;
use Models\Product\ProductCategory;

class ProductCategoryFactory extends Factory
{
    protected $model = ProductCategory::class;
 
    public function definition(): array
    {
        return [
            'title_fa' => fake()->word,
            "image" => fake()->randomElement(['1.jpg', '2.jpg','3.jpg']),
        ];
    }
}
