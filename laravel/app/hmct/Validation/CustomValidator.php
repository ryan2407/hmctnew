<?php namespace HMCT\Validation;


class CustomValidator {

    public function validateUniqueDate($attribute, $value, $parameters, $validator)
    {
        $bookingArray = [];
        $valueArray = explode(', ', $value);
        $bookings = \DB::table('bookings')->get();

        if(! $bookings) return true;

        foreach($bookings as $booking) {
            $bookingArray[] = $booking->dates;
        }
        foreach($bookingArray as $bookingDate) {
            $bookedDates = explode(', ', $bookingDate);
            if(array_intersect($bookedDates, $valueArray)) return false;
        }
        return true;

    }

    protected function replaceUniqueDate($message, $attribute, $rule, $parameters)
    {
        return str_replace('validation.uniquedate', $parameters = null, 'That date is unavailable');
    }

}
