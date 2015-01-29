<?php

class ProductTest extends TestCase {

    function __construct()
    {
        $this->repo = Mockery::mock('HMCT\Products\Repo\ProductRepositoryInterface');
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testGetProduct()
    {
        $repsonse = $this->action('GET', 'ProductController@show', ['id' => 10]);

        $this->assertResponseOk();
        $this->assertViewHas('product');
    }

    /**
     * @expectedException HMCT\Validation\ValidationException
     */
    public function testCreateProductValidation()
    {
        $response = $this->action('POST', 'ProductController@store', [
            'product_name' => 'Abc',
            'product_description' => 'Camper description',
            'product_cost' => 12345,
            'product_features' => serialize(['feature_one']),
            'category' => ''
        ]);
    }

//    public function testGetsProductRate()
//    {
//        $calculator = new \HMCT\Calculator\ProductRate(\App::make('HMCT\Products\Repo\ProductRepositoryInterface'));
//        dd($calculator->BaseRate('11-20-2014, 11-21-2014', '1'), $calculator->BaseRate('11-20-2014, 11-21-2014', '2'));
//    }

    public function testGetsSurchargeRate()
    {
        $calculator = new \HMCT\Calculator\ProductRate(\App::make('HMCT\Products\Repo\ProductRepositoryInterface'));
        $this->assertEquals(null, $calculator->SurchargeRate('02-10-2015, 02-10-2015', '10'));
    }

}
