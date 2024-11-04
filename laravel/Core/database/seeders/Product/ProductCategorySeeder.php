<?php

namespace Database\Seeders\Product;

use Illuminate\Database\Seeder;
use Models\Product\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::factory()->count(10)->create();
    }
}
