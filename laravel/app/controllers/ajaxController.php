<?php

use HMCT\Bookings\BookingValidation;
use HMCT\Calculator\CalculatorInterface;
use HMCT\Products\Repo\ProductRepositoryInterface;

class ajaxController extends \BaseController {

    protected $products;
    protected $rates;
    protected $validation;

    function __construct(ProductRepositoryInterface $products,
                         CalculatorInterface $rates,
                         BookingValidation $validation)
    {
        $this->products = $products;
        $this->rates = $rates;
        $this->validation = $validation;
    }

    public function getRate()
    {
        $this->validation->run(Input::all());
        $baseRate = 0; $surchargeRate = 0;
        $product_ids = explode(', ', Input::get('product_id'));
        foreach($product_ids as $id) {
            $products[] = $this->products->getById($id);
            $baseRate += $this->rates->BaseRate(Input::get('dates'), $id);
            $surchargeRate += $this->rates->SurchargeRate(Input::get('dates'), $id);
        }

        return Response::json(['baserate' => $baseRate, 'surcharge' => $surchargeRate, 'products' => $products]);
    }


}
