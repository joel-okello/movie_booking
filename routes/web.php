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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shedule', 'SheduleController@index')->name('shedule');
Route::get('/booked_movies', 'SheduleController@show_user_booked_movies')->name('booked_movies');

Route::get('/', 'SheduleController@show_user_booked_movies')->name('booked_movies');

Route::get('/add_movies', 'SheduleController@add_movies')->name('add_movies');
