<?php namespace HMCT\Bookings\Provider;

use HMCT\Dates\NumberNightsChecker;
use Illuminate\Support\ServiceProvider;

class BookingServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        \App::bind('HMCT\Bookings\Repo\BookingRepositoryInterface', 'HMCT\Bookings\Repo\BookingRepository');
        \App::bind('HMCT\Billing\BillingInterface', 'HMCT\Billing\Billing');
        \Event::listen('booking.created', 'HMCT\Bookings\Events\BookingEvent@created');
    }

    public function boot()
    {
        \Validator::extend('uniquedate', 'HMCT\Validation\CustomValidator@validateUniqueDate');
        \Validator::extend('sequentialdate', 'HMCT\Validation\dateValidator@validateSequentialDate');
        \Validator::resolver(function($translator, $data, $rules, $messages)
        {
            return new NumberNightsChecker($translator, $data, $rules, $messages);
        });
    }
}
