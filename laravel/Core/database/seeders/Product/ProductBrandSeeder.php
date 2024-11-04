<?php

namespace Database\Seeders\Product;

use Illuminate\Database\Seeder;
use Models\Product\ProductBrand;

class ProductBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductBrand::factory()->count(10)->create();
    }
}
