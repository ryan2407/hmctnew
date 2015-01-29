<?php namespace HMCT\Validation;

use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        \App::error(function(ValidationException $exception, $code)
        {
            if(\Request::ajax()) {
                return \Response::json([
                    'success' => false,
                    'errors' => true,
                    'message' => $exception->errors()
                ]);
            }
            return \Redirect::back()->withInput()->withErrors($exception->errors());
        });
    }
}
