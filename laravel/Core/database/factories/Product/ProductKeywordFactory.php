<?php

namespace Database\Factories\Product;

use Illuminate\Database\Eloquent\Factories\Factory;
use Models\Product\ProductKeyword;

class ProductKeywordFactory extends Factory
{
    protected $model = BlogKeyword::class;
 
    public function definition(): array
    {
        return [
            "product_id" => fake()->numberBetween(1,10),
            "keyword_id" => fake()->numberBetween(1,10),
        ];
    }
}
