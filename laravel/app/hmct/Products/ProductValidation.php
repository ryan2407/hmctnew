<?php namespace HMCT\Products;

use HMCT\Validation\Validator;

class ProductValidation extends Validator {

    public static $rules = [
        'product_name' => 'required',
        'product_description' => 'required',
        'product_cost' => 'required|numeric',
        'category' => 'required'
    ];

    public function run($input)
    {
        $this->validate($input, self::$rules);
    }

} 
