<?php

use HMCT\Bookings\Booking;
use Illuminate\Database\Seeder;

class BookingTableSeeder extends Seeder{

    public function run()
    {
        Eloquent::unguard();

        $faker = \Faker\Factory::create();

        foreach(range(1, 20) as $index)
        {
            $booking = Booking::create([
                'date_from' => '5-11-2014',
                'date_to' => '25-11-2014',
                'product_id' => $faker->numberBetween(1, 3),
                'customer_id' => $faker->numberBetween(1, 20)
            ]);
            $booking->product()->attach($faker->numberBetween(1, 3));
            $booking->save();
        }
    }

}
