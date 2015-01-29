<?php namespace HMCT\Calculator;

use HMCT\Products\Repo\ProductRepositoryInterface;

class ProductRate implements CalculatorInterface {

    protected $product;

    function __construct(ProductRepositoryInterface $product)
    {
        $this->product = $product;
    }

    public function BaseRate($dates, $product_id)
    {
        $dateCount = count(explode(', ', $dates));
        $product = $this->product->getById($product_id);
        return $dateCount * $product->product_cost;
    }

    public function SurchargeRate($dates, $product_id)
    {
        $surcharge = 0;
        $selectedDates = explode(', ', $dates);
        if($this->product->getById($product_id)->surcharge) {
            $surchargeDates = explode(', ', $this->product->getById($product_id)->surcharge->dates);
            $matchedDates = array_intersect($surchargeDates, $selectedDates);
            foreach($matchedDates as $date) {
                $surcharge += $this->product->getById($product_id)->surcharge->surcharge;
            }
            return $surcharge;
        }
    }
}
