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

use App\Bus;


Route::get('/', function() {
	$buses = Bus::all();
    return view('track')->with('buses', $buses);
});


Route::resource('trip', 'TripController');
Route::resource('track', 'TrackController');

// Route::post('/', 'TodoController@store');

// Route::get('/{task_id}/done', 'TodoController@task_complete');
// Route::get('/{task_id}/delete', 'TodoController@task_delete');




Route::get('/about', function() {
    return view('about');
});

Route::get('/contact', function() {
    return view('contact');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
