<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::view('/', 'home')->name('home');

//Handle Auth0 callback
Route::get('/auth0/callback', '\Auth0\Login\Auth0Controller@callback')->name('auth0-callback');
//Login
Route::get('/login', 'Auth\Auth0IndexController@login')->name('login');
//Logout
Route::get('/logout', 'Auth\Auth0IndexController@logout')->name('logout')->middleware('auth');


//Show a list of Hotels
Route::get('/hotels', 'HotelController@index')->name('hotels');

Route::prefix('dashboard')->group(function () {
    Route::view('/', 'dashboard.index')->name('dashboard');
    //ReservationController
    Route::get('reservations', 'ReservationController@index')->name('reservations');
    Route::get('reservations/{reservation}/create', 'ReservationController@create');
    Route::post('reservations', 'ReservationController@store')->name('reservations.store');
    Route::get('reservations/{reservation}', 'ReservationController@show')->name('reservations.show');
    Route::get('reservations/{reservation}/edit', 'ReservationController@edit')->name('reservations.edit');
    Route::patch('reservations/{reservation}', 'ReservationController@update')->name('reservations.update');
    Route::delete('reservations/{reservation}/delete', 'ReservationController@destroy')->name('reservations.destroy');
});
