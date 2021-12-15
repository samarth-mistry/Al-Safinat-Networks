<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('bizland');
});

Route::get('client-dashboard', 'BookingController@dashboard')->name('client-dashboard');
Route::get('admin-dashboard', 'AdminDashboardController@index')->name('admin-dashboard');

Route::post('admin-continents/data', 'ContinentsController@data')->name('admin-continents.data');
Route::resource('admin-continents', 'ContinentsController');

Route::post('admin-countries/data', 'CountryController@data')->name('admin-countries.data');
Route::resource('admin-countries', 'CountryController');

Route::post('admin-cities/data', 'CityController@data')->name('admin-cities.data');
Route::resource('admin-cities', 'CityController');

Route::post('admin-offices/data', 'OfficeController@data')->name('admin-offices.data');
Route::resource('admin-offices', 'OfficeController');

Route::post('admin-units/data', 'UnitController@data')->name('admin-units.data');
Route::resource('admin-units', 'UnitController');

Route::post('admin-vessels/data', 'VesselController@data')->name('admin-vessels.data');
Route::resource('admin-vessels', 'VesselController');

Route::post('admin-batches/data', 'BatchController@data')->name('admin-batches.data');
Route::resource('admin-batches', 'BatchController');


Auth::routes();
//Auth::routes(['register' => false]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::post('client-booking/data', 'BookingController@data')->name('client-booking.data');
Route::resource('client-booking', 'BookingController');
