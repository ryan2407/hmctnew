<?php namespace HMCT\Validation;

use Illuminate\Validation\Factory;

class Validator {

    protected $validator;

    function __construct(Factory $validator)
    {
        $this->validator = $validator;
    }

    public function validate($input, $rules)
    {
        $validate = \Validator::make($input, $rules);
        if($validate->fails()) {
            throw new ValidationException($validate->messages());
        }
        return true;
    }

} 
