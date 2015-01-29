<?php

//Page Routes
Route::get('/', ['uses' => 'PagesController@home']);
Route::get('about', ['uses' => 'PagesController@about']);
Route::get('contact', ['uses' => 'PagesController@contact']);
Route::get('rates', ['uses' => 'PagesController@rates']);
Route::get('setup', ['uses' => 'PagesController@setup']);
Route::get('login', ['uses' => 'SessionsController@showLogin']);
Route::post('login', ['uses' => 'SessionsController@login']);
Route::get('logout', function(){
   Auth::logout();
   return Redirect::to('/login')->with('success', 'You have been logged out');
});

//PRODUCT ROUTES
Route::get('products', ['uses' => 'ProductController@index', 'as' => 'all.products']);
Route::get('product/create', ['uses' => 'ProductController@create', 'as' => 'create.product']);
Route::post('products', ['uses' => 'ProductController@store', 'as' => 'store.product']);
Route::get('product/{id}', ['uses' => 'ProductController@show', 'as' => 'show.product']);
Route::post('product/{id}/', ['uses' => 'ProductController@update', 'as' => 'update.product']);
Route::get('product/{id}/edit', ['uses' => 'ProductController@edit', 'as' => 'edit.product']);
Route::post('upload', function() {
    $file = Input::file('filedata');
    $filename  = str_random(16);
    $extension = $file->getClientOriginalExtension();
    $size      = $file->getSize();
    $fullName  = $filename.'.'.$extension;

    Image::make($file->getRealPath())->fit('300')->save('uploads/thumbs/'.$fullName, 80);

    $upload_success = $file->move('uploads', $fullName);
    if( $upload_success ) {
        return Response::json(['name' => $fullName, 'size' => $size], 200);
    } else {
        return Response::json('error', 400);
    } });

Route::get('camper/{slug}', ['uses' => 'ProductController@getBySlug']);

//BOOKING ROUTES
Route::get('bookings', ['uses' => 'BookingController@index', 'as' => 'all.bookings']);
Route::post('bookings', ['uses' => 'BookingController@store', 'as' => 'store.booking']);
Route::get('booking/create', ['uses' => 'BookingController@create', 'as' => 'create.booking']);
Route::get('booking/{id}', ['uses' => 'BookingController@show', 'as' => 'show.booking']);
Route::post('booking/{id}', ['uses' => 'BookingController@update', 'as' => 'update.booking']);
Route::get('booking/{id}/receipt', ['uses' => 'BookingController@receipt', 'as' => 'booking.receipt']);

//ADMIN BOOKING ROUTES
Route::get('admin/bookings', ['uses' => 'BookingController@adminIndex', 'as' => 'admin.bookings']);
Route::get('admin/bookings/{id}', ['uses' => 'BookingController@adminShow', 'as' => 'admin.booking.show']);

//CUSTOMER ROUTES
Route::get('user/create', ['uses' => 'UsersController@create', 'as' => 'create.user']);
Route::post('user', ['uses' => 'UsersController@store', 'as' => 'store.user']);
Route::get('user/{id}', ['uses' => 'UsersController@show', 'as' => 'show.user']);
Route::get('user/{id}/bookings', ['uses' => 'UsersController@getBookings', 'as' => 'user.bookings']);

Route::post('getrates', ['uses' => 'ajaxController@getRate', 'as' => 'product.rate']);


Route::controller('password', 'RemindersController');


