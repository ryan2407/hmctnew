<?php namespace HMCT\Validation;

use Carbon\Carbon;

class dateValidator {


    function __construct()
    {
    }

    public function validateSequentialDate($attribute, $value, $parameters, $validator)
    {
        $valueArray = explode(', ', $value);
        foreach($valueArray as $value) {
            $dates[] = Carbon::createFromFormat('m-d-Y', $value);
        }
        $count = 0;
        foreach($dates as $date) {
            if(isset($dates[$count + 1])) {
                if($date->diffInDays($dates[$count + 1]) > 1) {
                    return false;
                }
                $count++;
            }
        }
        return true;
    }
}
