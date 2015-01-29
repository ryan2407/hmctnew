<?php

use HMCT\Customers\CustomerValidation;
use HMCT\Customers\Repo\CustomerRepositoryInterface;
use HMCT\Users\Repo\UserRepositoryInterface;
use HMCT\Users\UserValidation;

class UsersController extends \BaseController {

    protected $customers;
    protected $validation;

    function __construct(UserRepositoryInterface $customers, UserValidation $validation)
    {
        $this->users = $customers;
        $this->validation = $validation;
        $this->beforeFilter('owner', ['except' => 'store']);
    }


    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $customers = $this->users->getAll();
		return View::make('customers.index')->with('customers', $customers);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $this->validation->run(Input::all());
        $customer = $this->users->createUser(Input::all());
        return Redirect::route('show.user', ['id' => $customer->id]);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $customer = $this->users->getById($id);
		return View::make('users.show')->with('user', $customer);
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
		//
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


    public function getBookings($id)
    {
        $customer = $this->users->getById($id);
        return View::make('users.bookings')->with('user', $customer);
    }


}
