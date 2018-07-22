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

Route::get('check_forms',function(){
	return View('form');
});

Route::get('check_forms1',function(){
	return View('forms');
});
Route::get('check_form','SheduleController@check_form')->name('check_form');
Route::get('check_form1','SheduleController@check_form')->name('check_form1');


Route::get('redisplay_schedule/{id}/{first_date}/{last_name}','SheduleController@redisplay_schedule')->name('redisplay_schedule');



Route::get('sales_in_shows','SheduleController@sales_per_show')->name('sales_in_shows');

Route::get('summary_schedule','SheduleController@summary_schedule')->name('summary_schedule');

Route::get('new_shedules/{id}','SheduleController@add_shedule')->name('new_shedules');


Route::get('retrieve_schedule_info','SheduleController@retrieve_schedule_info');

Route::get('set_to_check_ticket_for_movie','SheduleController@receive_bouncer_request');

Route::get('check_ticket','SheduleController@show_check_ticket_interface');

Route::get('verify_ticket','SheduleController@verify_ticket');



//Route::get('retrieve_schedule_info','SheduleController@retrieve_schedule_info');

Route::get('/', 'HomeController@index')->name('home');


Route::get('qr-code', function () 
{
  return QRCode::text('QR Code Generator for Laravel!')->png();    
});

Auth::routes();

Route::get('table', function () {
    return view('table');
});




Route::post('seats_option', 'BookingController@store');




Route::post('show_movies_on_shedule', 'BookingController@store');

Route::get('/show_movies_on_shedule/{id}', 'SheduleController@view_details');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('schedule', 'SheduleController@show_schedule')->name('schedule');
Route::get('/booked_movies', 'SheduleController@show_user_booked_movies')->name('booked_movies');

Route::get('bouncer', 'SheduleController@show_bouncer_interface')->name('bouncer');
Route::resource('schedules', 'SheduleController');
Route::resource('add_movies', 'MoviesController');
Route::get('/show_schedule', 'SheduleController@show_schedule')->name('show_schedule');
Route::get('/show_movies_on_shedule', 'SheduleController@show_movies_on_shedule')->name('show_movies_on_shedule');


