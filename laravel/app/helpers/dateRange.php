<?php

function dateRange($first, $last, $step = '+1 day', $format = 'd-m-Y' ) {

    $dates = array();
    $current = strtotime($first);
    $last = strtotime($last);

    while( $current <= $last ) {

        $dates[] = date($format, $current);
        $current = strtotime($step, $current);
    }

    return $dates;
}

function dateHelper($dates) {
    $array = explode(', ', $dates);
    foreach($array as $arr) {
        $dateArray[] = \Carbon\Carbon::createFromFormat('m-d-Y', $arr);
    }
    return $dateArray;
}

function addQuote($string)
{
    $array = explode(', ', $string);
    $newArray = array();
    foreach($array as $value)
    {
        $newArray[] = "'".$value."'";
    }
    $newString = implode(', ', $newArray);
    return $newString;
}

function fromTo($dates)
{
    $dateArray = explode(', ', $dates);
    foreach($dateArray as $date) {
        $formattedDate[] = \Carbon\Carbon::createFromFormat('m-d-Y', $date);
    }
    return $formattedDate[0]->toFormattedDateString().' To: '.end($formattedDate)->toFormattedDateString();
}
