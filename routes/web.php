<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//Route::get('dashboard-1', 'AdminDashboardController@dashboard_1')->name('dashboard-1');
Route::get('admin-dashboard', 'AdminDashboardController@starter')->name('admin-dashboard');

Route::get('admin-continents/data', 'ContinentsController@data')->name('admin-continents.data');
Route::resource('admin-continents', 'ContinentsController');