<?php namespace HMCT\Validation;


class ValidationException extends \Exception {


    function __construct($errors)
    {
        $this->errors = $errors;
    }

    public function errors()
    {
        return $this->errors;
    }
} 
