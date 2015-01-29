<?php namespace HMCT\Billing;

use Illuminate\Support\ServiceProvider;

class BillingServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        \App::bind('HMCT\Billing\BillingInterface', '\HMCT\Billing\Billing');
    }
}
