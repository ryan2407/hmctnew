<?php namespace HMCT\Billing;


use HMCT\Products\Repo\ProductRepositoryInterface;

class RateCalculator {

    protected $product;

    function __construct(ProductRepositoryInterface $product)
    {
        $this->product = $product;
    }

    public function calculateRate($product_ids, $dates)
    {
        $ids = explode(', ', $product_ids);
        foreach($ids as $product) {
            $rate[] = array_sum($this->getTotalAmount($product, $dates));
        }
        return ['total' => array_sum($rate)];
    }

    public function getTotalAmount($product, $dates) {
        $dates = explode(', ', $dates);
        $product = $this->product->getById($product);
        if($product) {
            foreach($dates as $date) {
                $total[] = ($product->product_cost + $this->surcharge($date, $product));
            }
            return $total;
        }
        return [];
    }

    public function surcharge($date, $product)
    {
        if($product->surcharge) {
            $surchargeDates = explode(', ', $product->surcharge->dates);
            if(in_array($date, $surchargeDates)) {
                return $product->surcharge->surcharge;
            }
            return false;
        }
    }

} 
