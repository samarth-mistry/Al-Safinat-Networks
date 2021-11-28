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
Route::get('admin-dashboard/', function () {return view('admin_views.admin_dashboard');});
Route::get('/test2', function () {return view('pages.dashboard');});
Route::get('/test', 'HomeController@index')->name('test');
Route::get('/login', 'HomeController@index')->name('login');
Route::get('/register', 'HomeController@index')->name('register');
//Route::get('/', 'HomeController@index')->name('dashboard');
Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
