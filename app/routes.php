<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


// Route group for API versioning
Route::group(array('prefix' => 'api/v1'),function(){

	Route::resource('sessions', 'SessionsController', array('only'=> array('destroy','store')));
	Route::resource('items', 'ItemsController', array('only'=> array('index','show')));
	Route::resource('categories', 'CategoriesController', array('only'=> array('index')));
	Route::resource('tables', 'TablesController', array('only'=> array('index','show')));
	Route::resource('orders', 'OrdersController');
	Route::resource('orderItems', 'OrderItemsController');
	Route::resource('available-tables', 'AvailableTablesController');
});




	Route::get('profile',function(){

		return "PROFILE PAGE";

	})->before('auth');


	Route::get('/',array('as' => 'home', function(){
		if(Auth::check()){
		return Response::json(array('action'=>'loggedin?', 'status' => Auth::check(), 'user' => Auth::user()->firstname));
		}else{

			return "Welcome guest";
		}
	}));


Route::resource('sessions', 'SessionsController', array('only'=> array('create','destroy','store')));
Route::get('logout', 'SessionsController@destroy');
Route::get('login', 'SessionsController@create')->before('guest');
/* 
CURL -- REST

CREATE => POST
READ => GET 
UPDATE => PUT / PATCH
DELETE => DELETE

*/