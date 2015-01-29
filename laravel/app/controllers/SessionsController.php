<?php

class SessionsController extends \BaseController {

	public function showLogin()
    {
        return View::make('login');
    }

    public function login()
    {
        if(\Auth::attempt([
            'email' => Input::get('email'),
            'password' => Input::get('password')
        ])) {
            return Redirect::to('products');
        }
        return Redirect::to('login')->with('error', 'Wrong email/password combo');
    }


}
