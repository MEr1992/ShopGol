<?php

namespace Database\Factories\Product;

use Illuminate\Database\Eloquent\Factories\Factory;
use Models\Product\ProductBrand;

class ProductBrandFactory extends Factory
{
    protected $model = ProductBrand::class;
 
    public function definition(): array
    {
        return [
            'name_fa' => fake()->word,
            "logo" => fake()->randomElement(['1.jpg', '2.jpg','3.jpg']),
        ];
    }
}
