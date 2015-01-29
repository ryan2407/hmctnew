<?php namespace HMCT\Calculator;


use Illuminate\Support\ServiceProvider;

class CalculatorServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        \App::bind('HMCT\Calculator\CalculatorInterface', 'HMCT\Calculator\ProductRate');
    }
}
