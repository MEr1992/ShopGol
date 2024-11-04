<?php

namespace Database\Seeders\Product;

use Illuminate\Database\Seeder;
use Models\Product\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->count(10)->create();
    }
}
