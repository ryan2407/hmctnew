<?php

use HMCT\Customers\Customer;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder{

    public function run()
    {
        Eloquent::unguard();

        $faker = \Faker\Factory::create();

        foreach(range(1, 20) as $index)
        {
            Customer::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make($faker->word),
                'phone' => $faker->phoneNumber,
                'booking_id' => $faker->numberBetween(0, 20)
            ]);
        }
    }

} 
