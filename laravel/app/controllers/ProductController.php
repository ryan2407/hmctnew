<?php

use HMCT\Billing\RateCalculator;
use HMCT\Calculator\CalculatorInterface;
use HMCT\Products\Repo\ProductRepositoryInterface;
use \HMCT\Products\ProductValidation;

class ProductController extends \BaseController {

    public $products;
    public $validation;
    public $rates;

    function __construct(ProductRepositoryInterface $products,
                         ProductValidation $validation,
                         CalculatorInterface $rates)
    {
        $this->validation = $validation;
        $this->products = $products;
        $this->rates = $rates;
        $this->beforeFilter('admin', array('except' => ['index', 'show', 'getBySlug']));
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $products = $this->products->getAll();
		return View::make('products.index')->with('products', $products);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('products.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $this->validation->run(Input::all());
        $product = $this->products->createProduct(Input::all());
		return Redirect::route('show.product', ['id' => $product->id]);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $product = $this->products->getById($id);
		return View::make('products.show')->with('product', $product);
	}

    function getBySlug($slug)
    {
        $product = $this->products->getBySlug($slug)->first();
        return View::make('products.show')->with('product', $product);
    }


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $product = $this->products->getById($id);
        return View::make('products.edit')->with('product', $product);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$this->products->updateProduct($id, Input::all());
        return Redirect::to('products');
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
