<?php namespace HMCT\Users;

use HMCT\Validation\Validator;

class UserValidation extends Validator {

    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:users',
        'phone' => 'required',
        'password' => 'required|confirmed'
    ];

    public function run($input)
    {
        $this->validate($input, self::$rules);
    }

}
