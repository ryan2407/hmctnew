<?php

use HMCT\Products\Repo\ProductRepositoryInterface;

class PagesController extends \BaseController {

    protected $products;

    function __construct(ProductRepositoryInterface $products)
    {
        $this->products = $products;
        View::share('products', $this->products->getAll());
    }

    public function home()
    {
        $products = $this->products->getCategory('campers');
        return View::make('pages.home')->with('products', $products);
    }

    public function about()
    {
        return View::make('pages.about');
    }

    public function contact()
    {
        return View::make('pages.contact');
    }

    public function rates()
    {
        return View::make('pages.rates');
    }

    public function setup()
    {
        return View::make('pages.setup');
    }

}
