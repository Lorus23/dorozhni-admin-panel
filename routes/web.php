<?php

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>['auth']], function () {

    Route::group(['prefix' => 'rooms'], function () {
        Route::get('/', 'RoomsController@index')->name('rooms');
        Route::get('/create', 'RoomsController@create')->name('rooms.create');
        Route::post('/store', 'RoomsController@store')->name('rooms.store');
        Route::get('/delete/{room_id}', 'RoomsController@delete')->name('room.delete');
        Route::get('/edit/{room_id}', 'RoomsController@edit')->name('room.edit');
        Route::post('/update/{room_id}', 'RoomsController@update')->name('room.update');
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'CategoriesController@index')->name('categories');
        Route::get('/create', 'CategoriesController@create')->name('category.create');
        Route::post('/store', 'CategoriesController@store')->name('category.store');
        Route::get('/delete/{category_id}', 'CategoriesController@delete')->name('category.delete');
        Route::get('/edit/{category_id}', 'CategoriesController@edit')->name('category.edit');
        Route::post('/update/{category_id}', 'CategoriesController@update')->name('category.update');
    });

    Route::group(['prefix' => 'buildings'], function () {
        Route::get('/', 'BuildingsController@index')->name('buildings');
        Route::get('/create', 'BuildingsController@create')->name('building.create');
        Route::post('/store', 'BuildingsController@store')->name('building.store');
        Route::get('/delete/{category_id}', 'BuildingsController@delete')->name('building.delete');
        Route::get('/edit/{category_id}', 'BuildingsController@edit')->name('building.edit');
        Route::post('/update/{category_id}', 'BuildingsController@update')->name('building.update');
    });

    Route::group(['prefix' => 'customers'], function () {
        Route::get('/', 'CustomersController@index')->name('customers');
        Route::get('/create', 'CustomersController@create')->name('customer.create');
        Route::post('/store', 'CustomersController@store')->name('customer.store');
        Route::get('/delete/{customer_id}', 'CustomersController@delete')->name('customer.delete');
        Route::get('/edit/{customer_id}', 'CustomersController@edit')->name('customer.edit');
        Route::post('/update/{customer_id}', 'CustomersController@update')->name('customer.update');
    });

    Route::group(['prefix' => 'bookings'], function () {
        Route::get('/', 'BookingsController@index')->name('bookings');
        Route::get('/show/{booking_id}', 'BookingsController@show')->name('booking.show');
        Route::get('/create', 'BookingsController@create')->name('booking.create');
        Route::post('/store', 'BookingsController@store')->name('booking.store');
        Route::get('/delete/{booking_id}', 'BookingsController@delete')->name('booking.delete');
        Route::get('/edit/{booking_id}', 'BookingsController@edit')->name('booking.edit');
        Route::post('/update/{booking_id}', 'BookingsController@update')->name('booking.update');
    });

    Route::get('/users', 'UsersController@index')->name('users');
});
