<?php

use HMCT\Products\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder{

    public function run()
    {
        Eloquent::unguard();

        $faker = \Faker\Factory::create();

        foreach(range(1, 20) as $index)
        {
            Product::create([
                'product_name' => $faker->name,
                'product_description' => $faker->text(),
                'product_cost' => $faker->numberBetween(0, 50000)
            ]);
        }
    }

}
