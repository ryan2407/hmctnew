<?php namespace HMCT\Dates;

use Illuminate\Validation\Validator;

class NumberNightsChecker extends Validator {

    protected $dayNumber = 3;

    public function validateMinnights($attribute, $value, $parameters)
    {
        $peakDates = \DB::table('peakdates')->get();
        $dateArray = explode(', ', $value);
        $dates = array_filter($peakDates, function($value) use ($parameters) {
            return $value->product_id == $parameters[0];
        });

        $result = [];
        foreach($dates as $date) {
            $peakDates = explode(', ', $date->dates);
            $result = array_merge($peakDates, $result);
            if(array_intersect($result, $dateArray)) {
                $this->dayNumber = '5';
                return $this->checkCount($dateArray, $date);
            }
        }
        if(count($dateArray) >= 3) {
            return true;
        }
        return false;
    }

    private function checkCount($dateArray, $date)
    {
        if(count($dateArray) >= intval($date->numberofnights))
        {
            return true;
        }
        return false;
    }

    protected function replaceMinnights($message, $attribute, $rule, $parameters)
    {
        return str_replace(':days', $this->dayNumber, $message);
    }
}
