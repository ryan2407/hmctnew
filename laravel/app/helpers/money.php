<?php

function money($amount) {
    $amount = $amount / 100;
    return '$'.$amount;
}
