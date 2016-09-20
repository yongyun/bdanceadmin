<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::auth();

Route::get('/project/lists', 'ProjectController@lists');
Route::get('/project/detail/{id}', 'ProjectController@detail');

Route::get('/home', 'HomeController@index');
Route::get('/', function () {
	if (Auth::check()) {
		return redirect()->action('HomeController@index');
	} else {
		return redirect()->route('login');
	}
    
});
