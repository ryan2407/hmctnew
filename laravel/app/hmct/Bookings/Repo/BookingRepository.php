<?php namespace HMCT\Bookings\Repo;

use HMCT\Billing\BillingInterface;
use HMCT\Bookings\Booking;
use HMCT\Calculator\ProductRate;

class BookingRepository implements BookingRepositoryInterface {

    public $biller;
    public $rate;

    function __construct(BillingInterface $biller, ProductRate $rate)
    {
        $this->biller = $biller;
        $this->rate = $rate;
    }

    public function getAll()
    {
        return Booking::all();
    }

    public function createBooking($input)
    {

        $booking = Booking::create([
            'dates' => $input['dates'],
            'user_id' => \Auth::user()->id
        ]);

        $this->biller->charge($input['deposit'], \Auth::user());

        $booking->product()->attach(explode(', ', $input['product_id']));
        $booking->save();

        \Event::fire('booking.created', [$booking]);

        return $booking;
    }

    public function manualBooking($input) {
        $booking = Booking::create([
            'dates' => $input['dates'],
            'user_id' => $input['user_id'],
            'deposit' => $input['deposit'],
            'discount' => $input['discount']
        ]);

        $booking->product()->attach(explode(', ', $input['product_id']));
        $booking->save();

        \Event::fire('booking.created', [$booking]);

        return $booking;
    }

    public function getById($id)
    {
        return Booking::find($id);
    }
}
