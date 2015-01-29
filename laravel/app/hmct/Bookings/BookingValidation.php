<?php namespace HMCT\Bookings;

use HMCT\Validation\Validator;

class BookingValidation extends Validator {

    public function run($input)
    {
        $this->validate($input, [
            'dates' => 'required|sequentialdate|minnights:'.$input['product_id'],
            'user_id' => 'required|numeric',
            'terms' => 'accepted'
        ]);
    }

}
