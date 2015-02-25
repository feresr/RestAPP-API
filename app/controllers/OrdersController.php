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
			$coords = Coord::all();
			return View::make('order.index', array('coords' => $coords, 'orders' => $orders));
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$order = new Order();
		$users = User::all(array('id','firstname','lastname'));
		$table = Table::find($id);
		return View::make('order.save', array('order' => $order, 'users'=> $users,'table'=>$table)); 
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
		if(Request::wantsJson())
			{
			return Response::json(array('success' => true, 
				'message' => 'Se agrego la orden correctamente',
				'id' => $order->id));
			}
		return Redirect::to('orders')->with('notice', 'Se agrego la orden correctamente.');

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
	* Display the specified resource.
	*
	* @param  int  $id
	* @return Response
	*/
	public function delete($id)
	{
		$order = Order::find($id);
		if (Request::wantsJson())
		{
			return Response::json($order);
		}else{
			return View::make('order.delete', array('order' => $order));
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

			$order->active = 0;
			$order->table->taken = 0;

			$order->push();

				return Response::json(array(
					'success' => true,
					'message' => 'La orden fue cerrada con éxito'
				));
		}else{

			return Response::json(array(
				'success' => false,
				'message' => 'Orden no encontrada'
			));
		}
	}


public function coords()
	{
	$coords = Coord::all();
	return Response::json($coords);
	}


public function getOrder($id)
	{
		$order = DB::table('orders')
					->select('id')
					->where('table_id', $id)
                    ->where('active', true)
                    ->get();

		//$order = Order::where('table_id', '=', $id)->where('active', '=', true)->get();
			if(count($order) == 0)
			{
				return Response::json(array(
				'success' => false
			));
				
			}
		else{
				return Response::json($order[0]);	
			}
	}

}