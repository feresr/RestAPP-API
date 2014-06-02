<?php

class OrdersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		if(Auth::check()){

			$orderRow = Order::where('user_id',Auth::User()->id)->get();

			foreach($orderRow as $order){

				$order = array(
						'id' 			=> 	$order->id ,
						'table' 		=> 	$order->table->toArray(),
						'user_id' 		=> 	$order->user_id,
						'created_at' 	=> 	$order->created_at,
						'updated_at' 	=>	$order->updated_at,
						'items'			=> 	$order->items->toArray()
				);
			}

			return Response::json($orderRow->toArray());

		}else{

			return Response::json(array('action'=>'fetch-orders', 'status' => 'faliure'));

		}


	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('orders.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(Auth::check()){
			$order = Input::get();
			$table = Input::get('table');
			$items = Input::get('items');

			if(!$table->taken){
				$table->taken = true;

				$order->push();
				$table->push();

				return Response::json(array('action'=>'new-order', 'status' => 'success', 'order' => $order->toArray() ));


			}else{

				return Response::json(array('action'=>'new-order', 'status' => 'faliure', 'message' => 'taken' ));

			}

		}

		return Response::json(array('action'=>'new-order', 'status' => 'faliure', 'message' => 'unauthenticated user' ));
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
		if($order){

				$order = array(
					'id' 			=> 	$order->id ,
					'table' 		=> 	$order->table->toArray(),
					'user_id' 		=> 	$order->user_id,
					'created_at' 	=> 	$order->created_at,
					'updated_at' 	=>	$order->updated_at,
					'items'			=> 	$order->items->toArray()
				);

			return Response::json($order);

		}

		return Response::json(array('action'=>'show-order', 'status' => 'faliure', 'message' => 'order doesnt belong to user' ));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{


		$order = Order::find($id);

		if($order->user == Auth::user()){


			if (Request::isJson())
			{


			    $input = Input::json()->all();




			    DB::table('order_item')->where('order_id', '=', $id)->delete();



			    foreach($input["items"] as $item){

				   	DB::table('order_item')->insert( array(
				   								'order_id' => $id,
				   								'quantity' => $item['quantity'],
				   								'item_id'	=> $item['item_id'],
				   								'price' => $item['price'],
				   								)
											);

			    }

			return Response::json(array('action'=>'update-order', 'status' => 'success'));


			}

			return Response::json(array('action'=>'update-order', 'status' => 'failure', 'message' => 'no json received'));
		}

		return Response::json(array('action'=>'update-order', 'status' => 'failure', 'message' => 'this order doesnt belong to this user'));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
