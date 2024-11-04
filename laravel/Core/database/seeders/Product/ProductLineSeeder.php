<?php

namespace Database\Seeders\Product;

use Illuminate\Database\Seeder;
use Models\Product\ProductLine;

class ProductLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductLine::factory()->count(10)->create();
    }
}
