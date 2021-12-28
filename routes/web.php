<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('bizland');});

Route::get('ajax/get-batch-by-vessel/{vessel_id}', 'AjaxController@getBatchByVessel')->name('ajax/get-batch-by-vessel');
Route::get('ajax/get-port-by-country/{country_id}', 'AjaxController@getPortByCountry')->name('ajax/get-port-by-county');
Route::get('ajax/get-next-port/{vessel_id}/{curr_port_id}', 'AjaxController@getNextPort')->name('ajax/get-next-port');

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

Route::post('admin-trackings/data', 'TrackingController@data')->name('admin-trackings.data');
Route::post('admin-trackings/outgoing-data', 'TrackingController@outGoingData')->name('admin-trackings.outgoing-data');
Route::get('admin-trackings/status-ported/{id}', 'TrackingController@setStatusPorted')->name('admin-trackings.status-ported');
Route::get('admin-trackings/status-deported/{id}', 'TrackingController@setStatusDeported')->name('admin-trackings.status-deported');
Route::resource('admin-trackings', 'TrackingController');

Route::get('admin-vessel-routes/data', 'VesselRouteController@data')->name('admin-vessel-routes.data');
Route::post('admin-vessel-routes/data', 'VesselRouteController@data')->name('admin-vessel-routes.data');
Route::resource('admin-vessel-routes', 'VesselRouteController');

Route::post('admin-pricings/data', 'PricingController@data')->name('admin-pricings.data');
Route::resource('admin-pricings', 'PricingController');

Route::get('admin-global-traffic/index', 'TrackingController@index')->name('admin-global-traffic.index');
Route::get('admin-delivered-batches/index', 'TrackingController@deliveredBatchesIndex')->name('admin-delivered-batches.index');

Auth::routes();
//Auth::routes(['register' => false]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::post('client-booking/data', 'BookingController@data')->name('client-booking.data');
Route::resource('client-booking', 'BookingController');

