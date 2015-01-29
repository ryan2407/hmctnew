<?php namespace HMCT\Products\Repo;

use Carbon\Carbon;
use HMCT\Products\Product;
use HMCT\Products\RatesCalculator;

class ProductRepository implements ProductRepositoryInterface {

    protected $rates;

    function __construct()
    {
    }


    public function getAll()
    {
        return Product::all();
    }

    public function createProduct($input)
    {
        $product = Product::create($input);
        if(isset($input['files'])) {
            $product->product_images = serialize($input['files']);
        }
        $product->save();
        return $product;
    }

    public function getById($id)
    {
        return Product::find($id);
    }
    public function getBySlug($slug)
    {
        return Product::where('slug', '=', $slug)->get();
    }

    public function updateProduct($id, $input)
    {
        $product = Product::find($id);
        $product->update($input);
        if(isset($input['files'])) {
            $product->product_images = serialize($input['files']);
            $product->save();
        }
        return $product;
    }

    public function getCategory($category)
    {
        $product = Product::where('category', '=', $category)->get();
        return $product;
    }
}
