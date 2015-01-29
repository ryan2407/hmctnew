<?php namespace HMCT\Calculator;

interface CalculatorInterface {

    public function BaseRate($dates, $product_id);
    public function SurchargeRate($dates, $product_id);

}
