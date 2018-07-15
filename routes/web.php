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

Route::get('retrieve_schedule_info','SheduleController@retrieve_schedule_info');


//Route::get('retrieve_schedule_info','SheduleController@retrieve_schedule_info');

Route::get('/', 'HomeController@index')->name('home');

//Route::get('old1', 'SheduleController@test');

Auth::routes();


Route::post('show_movies_on_shedule', 'BookingController@store');

Route::get('/show_movies_on_shedule/{id}', 'SheduleController@view_details');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('schedule', 'SheduleController@show_schedule');
Route::get('/booked_movies', 'SheduleController@show_user_booked_movies')->name('booked_movies');

Route::resource('schedules', 'SheduleController');
Route::resource('add_movies', 'MoviesController');
Route::get('/show_schedule', 'SheduleController@show_schedule')->name('show_schedule');
Route::get('/show_movies_on_shedule', 'SheduleController@show_movies_on_shedule')->name('show_movies_on_shedule');


