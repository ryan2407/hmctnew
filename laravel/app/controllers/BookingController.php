<?php

use HMCT\Bookings\BookingValidation;
use HMCT\Bookings\Repo\BookingRepositoryInterface;
use HMCT\Billing\BillingInterface;

class BookingController extends \BaseController {

    protected $bookings;
    protected $validation;
    protected $biller;

    function __construct(BookingRepositoryInterface $bookings,
                         BookingValidation $validation,
                         BillingInterface $biller)
    {
        $this->bookings = $bookings;
        $this->validation = $validation;
        $this->biller = $biller;
        $this->beforeFilter('auth');
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $bookings = $this->bookings->getAll();
		return View::make('bookings.index')->with('bookings', $bookings);
	}


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
	public function create()
	{
		return View::make('bookings.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
    {
		$this->validation->run(Input::all());
        $this->bookings->createBooking(Input::all());
        return Redirect::to('user/'.Auth::user()->id);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $booking = $this->bookings->getById($id);
		return View::make('bookings.show')->with('booking', $booking);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $this->bookings->updateBooking($id, Input::all());
        return Redirect::to('bookings');
	}

    public function receipt($id)
    {
        $booking = $this->bookings->getById($id);
        return View::make('bookings.receipt')->with('booking', $booking);
    }

    public function adminIndex()
    {
        $bookings = $this->bookings->getAll();
        return View::make('admin.bookings')->with('bookings', $bookings);
    }


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
