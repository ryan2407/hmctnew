<?php

class BookingTest extends TestCase {

    function __construct()
    {
    }

    public function tearDown()
    {
        Mockery::close();
        Auth::logout();
    }

    public function testThatABookingCanOnlyBeCreatedIfLoggedIn()
    {
        Route::enableFilters();
        //Hit the booking create route
        $response = $this->call('GET', 'booking/create');

        //Assert that you are redirected if not logged in
        $this->assertRedirectedTo('login');
    }

    public function testBookingRate()
    {
        $rates = new \HMCT\Billing\RateCalculator(new HMCT\Products\Repo\ProductRepository());

        $this->assertEquals('8000', $rates->calculateRate('10', '11-20-2014')['total']);
    }


    public function testSequentialDatesValidation()
    {
        $validator = new \HMCT\Validation\dateValidator();
        $this->assertFalse($validator->validateSequentialDate(null, '11-20-2014, 11-22-2014', null, null));
    }

    /**
     * @expectedException HMCT\Validation\ValidationException
     */
    public function testMinimumNightsValidation()
    {
        $this->call('POST', '/getrates', [
            'product_id' => 1,
            'user_id' => 1,
            'dates' => '11-12-2015, 11-13-2015']);
    }

    public function testAdminSeesAllBookings()
    {
        $repo = Mockery::mock('HMCT\Bookings\Repo\BookingRepositoryInterface');
        $repo->shouldReceive('getAll')->once()->andReturn(array('foo'));
        $this->app->instance('HMCT\Bookings\Repo\BookingRepositoryInterface', $repo);

        $this->action('GET', 'BookingController@adminIndex');

        $this->assertResponseOk();
        $this->assertViewHas('bookings', array('foo'));
    }

    public function testAdminSeesBooking()
    {
        $repo = Mockery::mock('HMCT\Bookings\Repo\BookingRepositoryInterface');
        $repo->shouldReceive('getById')->once()->andReturn(array('foo'));
        $this->app->instance('HMCT\Bookings\Repo\BookingRepositoryInterface', $repo);

        $this->action('GET', 'BookingController@adminShow');

        $this->assertResponseOk();
        $this->assertViewHas('booking', array('foo'));
    }

}
