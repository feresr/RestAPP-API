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
		$users = User::all(array('id','name','lastname'));
		$tables = Table::where('taken',false)->get();
		return View::make('order.save', array('order' => $order, 'users'=> $users,'tables'=>$tables)); 
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

			return Response::json($order);

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
		return View::make('order.save', array('order' => $order, 'tables' => $tables, 'users' => $users));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

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

			return Response::json($order);

		}else{

			return Response::json(array(
				'success' => false,
				'errors' => 'Order not found'
			));	
		}
	}
}