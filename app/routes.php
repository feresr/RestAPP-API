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
Route::group(array('before' => 'auth','prefix' => 'api/v1'),function(){

	//Route::resource('sessions', 'SessionsController', array('only'=> array('destroy','store')));
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
Route::post('login', 'SessionsController@store');
/* 
CURL -- REST

CREATE => POST
READ => GET 
UPDATE => PUT / PATCH
DELETE => DELETE

*/

Route::get('/', 'HomeController@index');
Route::post('/', 'HomeController@store');
//Route::get('web/reservas/{reservas}','ReservaController@reservasListado');
Route::post('reservasFace/create', 'ReservaController@storeFace');
Route::get('reservas/{id}/{name}', 'ReservaController@getReservas');

Route::group(array('before' => 'auth'), function()
{
Route::get('users', 'UsersController@index');
Route::get('users/create', 'UsersController@create');
Route::post('users/create', 'UsersController@store');
Route::post('users/create/{id}', 'UsersController@update');
Route::get('users/{id}/edit', 'UsersController@edit');
Route::post('users/delete/{id}', 'UsersController@destroy');

//Route::resource('users', 'UsersController');

Route::get('admin', 'HomeController@indexAdmin');
Route::get('admin/cargagraficos', 'StatisticsController@index');
Route::get('admin/colum', 'StatisticsController@barrasChart');
Route::get('admin/colum1/{d}/{h}', 'StatisticsController@mozosMensuales');
Route::get('admin/colum/{d}/{h}', 'StatisticsController@ventasMensuales');
Route::get('admin/colum1', 'StatisticsController@barrasChart1');
Route::get('admin/mesasXmozo', 'StatisticsController@mesasXmozo');
Route::get('admin/mesasXmozo/{d}/{h}', 'StatisticsController@mesasXmozoFiltrado');

Route::get('cocina','CocinaController@index');
Route::get('listOrders', 'CocinaController@items');
Route::post('listOrders/{cant}/{items}', 'CocinaController@itemsOrders');
Route::post('orders/view/{id}', 'CocinaController@orderview');


Route::get('orders/coords', 'OrdersController@coords');
//Route::get('orders/edit', 'OrdersController@editar');
Route::get('orders','OrdersController@index');
Route::get('orders/create/{id}', 'OrdersController@create');
Route::post('orders/create', 'OrdersController@store');
Route::get('orders/editar/{id}', 'OrdersController@edit');
Route::post('orders/create/{id}', 'OrdersController@update');
Route::get('orders/cobrar/{id}', 'OrdersController@cobrar');
Route::post('orders/cobrar/{id}', 'OrdersController@save');
Route::get('orders/{id}', 'OrdersController@show');
Route::get('orders/delete/{id}', 'OrdersController@delete');
Route::post('orders/delete/{id}', 'OrdersController@destroy');

Route::get('orders/edit/list/{id}', 'OrderItemsController@items');
Route::get('list/{id}', 'OrderItemsController@items');
Route::get('orders/list/{id}', 'OrderItemsController@items');
Route::get('orders/edit/{id}', 'OrderItemsController@edit');
Route::post('orders/edit', 'OrderItemsController@store');
Route::post('orders/{iditem}', 'OrderItemsController@destroy');
//Route::post('orders/{iditem}', 'OrderItemsController@destroy');//ver si lo dejo
Route::get('edi/{id}', 'OrdersController@getOrder');

Route::get('items', 'ItemsController@index');
Route::get('items/create', 'ItemsController@create');
Route::post('items/create', 'ItemsController@store');
Route::get('item/create/{id}', 'ItemsController@crear');
Route::post('item/create', 'ItemsController@store');
Route::get('items/{id}/edit', 'ItemsController@edit');
Route::post('items/create/{id}', 'ItemsController@update');
Route::post('items/delete/{id}', 'ItemsController@destroy');

Route::get('categorias', 'CategoriesController@index');
Route::get('categorias/create', 'CategoriesController@create');
Route::post('categorias/create', 'CategoriesController@store');
Route::get('categorias/{id}/edit', 'CategoriesController@edit');
Route::post('categorias/create/{id}', 'CategoriesController@update');
Route::post('categorias/delete/{id}', 'CategoriesController@destroy');

Route::get('tables', 'TablesController@index');
Route::get('tables/create', 'TablesController@create');
Route::post('tables/create', 'TablesController@store');
Route::get('tables/edit/{id}', 'TablesController@edit');
Route::post('tables/create/{id}', 'TablesController@update');
Route::get('tables/delete/{id}', 'TablesController@delete');
Route::post('tables/delete/{id}', 'TablesController@destroy');
Route::post('tables/{id}', 'TablesController@destroy');
Route::get('tables/edit', 'TablesController@editPosition');
Route::post('tables/savepos/{left}/{top}/{id}', 'TablesController@savepos');

Route::get('reservas','ReservaController@index');
Route::get('reservas/create', 'ReservaController@create');
Route::post('reservas/create', 'ReservaController@store');
Route::get('reservas/{id}/edit', 'ReservaController@edit');
Route::post('reservas/create/{id}', 'ReservaController@update');
Route::post('reservas/delete/{id}', 'ReservaController@destroy');

Route::post('cocina/check/{id}', 'CocinaController@chkItem');


Route::post('listOrders', 'CocinaController@itemsOrders');
});