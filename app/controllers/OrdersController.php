<?php

class OrdersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Request::wantsJson())
		{
			$orders = Auth::User()->orders(true)->get();
			return Response::json($orders);
		}else{
			$orders = Order::where('active', true)->get();
			return View::make('order.index', array('orders' => $orders));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$order = new Order();
		$users = User::all(array('id','firstname','lastname'));
		$tables = Table::where('taken',false)->get();
		$title = 'NUEVA';
		return View::make('order.save', array('order' => $order, 'users'=> $users,'tables'=>$tables, 'title' => $title)); 
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::get();
		$validator = Order::validate($input);

		if($validator->fails()){
				return Response::json(array(
				'success' => false,
				'errors' => $validator->getMessageBag()->toArray()
			));
		}

		$table = Table::find($input['table_id']);

		if(!$table->taken){

			$order = new Order();
			if(isset($input['user_id'])){
				$order->user_id = $input['user_id'];
			}else{
				$order->user_id = Auth::User()->id;
			}
			
			$order->table_id = $table->id;
			$order->table->taken = true;
			
			$order->push();

			return Response::json(array('success' => true, 
				'message' => 'Se agrego la orden correctamente',
				'id' => $order->id));


		}else{

			return Response::json(array(
					'success' => false,
					'errors' => 'Table is taken'
			));	
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$order = Order::find($id);
		if (Request::wantsJson())
		{
			return Response::json($order);
		}else{
			return View::make('order.show', array('order' => $order));
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$order = Order::find($id);
		$tables = Table::all(array('id','number', 'taken'));
		$users = User::all();
		$title = 'EDITAR';
		return View::make('order.save', array('order' => $order, 'tables' => $tables, 'users' => $users, 'title' => $title));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::get();
		$order = Order::find($id);
		$validator = Order::validate($input, $order->id);
	 	if ($validator->fails()){
			return Response::json(array(
				'success' => false,
				'errors' => $validator->getMessageBag()->toArray()
			));
		}else{  
			$table = Table::find($order->table_id);
			$table->taken= false;
			$table->save();

			$table = Table::find($input['table_id']);
			$order->table_id = $table->id;
			$order->user_id = $input['user_id'];
			$order->table->taken = true;
			$order->push();
			return Response::json(array(
				'success' => true,
				'idorder' => $id
			));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$order = Order::find($id);
		if($order != null){

			$order->active = false;
			$order->table->taken = false;

			$order->push();

			if(Request::wantsJson())
			{
				return Response::json($order);
			}
			else{
				return Redirect::to('orders')->with('notice', 'La Orden ha sido eliminada correctamente.');
			}
		}else{

			return Response::json(array(
				'success' => false,
				'errors' => 'Order not found'
			));	
		}
	}
public function mesas()
	{
	$coords = Coord::all();
	//$orders = Order::where('active', true)->get();
	return View::make('order.mesas', array('coords' => $coords));
	}

public function coords()
	{
	$coords = Coord::all();
	return Response::json($coords);
	}

public function editar()
	{
	$coords = Coord::all();
	$orders = Order::where('active', true)->get();
	//$orders = Order::where('active', true)->get();
	return View::make('order.edit', array('coords' => $coords, 'orders' => $orders));
	}

public function edi($id)
	{
		$order = Order::where('table_id', '=', $id)->where('active', '=', true)->get();
			if($order != null)
			{
				return Response::json($order);
			}
		//$order = Order::find(2);
			return Response::json(array(
				'success' => false
			));
		//return View::make('order.agregar', array('categories' => $categories, 'order' => $order));
		//return Redirect::to('orders/edit/'.$order->id);	
	}

public function savepos($left, $top, $id)
	{
	$coord = Coord::find($id);
	$coord->x_pos = $left;
	$coord->y_pos = $top;
	$coord->save();

	return Response::json(array(
	'success' => true,
	'message' => 'cambio pos'
	));	
	}
}