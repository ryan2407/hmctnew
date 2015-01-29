<?php namespace HMCT\Products\Provider;

use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        \App::bind('HMCT\Products\Repo\ProductRepositoryInterface', 'HMCT\Products\Repo\ProductRepository');
    }
}
