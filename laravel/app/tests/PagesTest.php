<?php

class PagesTest extends TestCase {

    function __construct()
    {
        //$this->repo = Mockery::mock('HMCT\Products\Repo\ProductRepositoryInterface');
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testGetHomePage()
    {
        $repsonse = $this->action('GET', 'PagesController@home');

        $this->assertResponseOk();
    }

    public function testGetAboutPage()
    {
        $repsonse = $this->action('GET', 'PagesController@about');

        $this->assertResponseOk();
    }

    public function testGetContactPage()
    {
        $repsonse = $this->action('GET', 'PagesController@contact');

        $this->assertResponseOk();
    }

}
