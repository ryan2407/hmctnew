<?php namespace HMCT\Users\Provider;


use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        \App::bind('HMCT\Users\Repo\UserRepositoryInterface', 'HMCT\Users\Repo\UserRepository');
        \Event::listen('user.created', 'HMCT\Users\Events\UserEvent@created');
    }
}
