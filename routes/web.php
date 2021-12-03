<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('dashboard-1', 'AdminDashboardController@dashboard_1')->name('dashboard-1');
Route::get('admin-continents/data', 'ContinentsController@data')->name('admin-continents.data');
Route::resource('admin-continents', 'ContinentsController');