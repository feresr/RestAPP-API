<?php

class OrderItemsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = Auth::User()->orders(true)->get();

		$response = array();
		foreach ($orders as $order) {
			$itemsInOrder = OrderItem::where('order_id', $order->id)->get()->toArray();
			array_push($response,$itemsInOrder);
		}

		return Response::json($response);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::get();
		$validator = OrderItem::validate($input);

		if(!$validator->fails())
		{
			$orderItem = new OrderItem();
			$item = Item::find($input['item_id'], array('id','price'));
			$quantity = $input['quantity'];
			$total = $item->price * $quantity;
			//TODO: Deberiamos checkear si la orden existe y está activa.
			$order = Order::find($input['order_id']);
			$order->total += $total;
			$order->save();

			$orderItem = new OrderItem();
			$orderItem->item_id = $item->id;
			$orderItem->order_id = $order->id;
			$orderItem->quantity = $quantity;
			$orderItem->price = $item->price;
			$orderItem->save();

			return Response::json(array(
				'success'     =>  true,
				'message'     =>  'Se agrego el item correctamente',
				'id' => $orderItem->id
			));
		}
		else {
			return Response::json(array(
				'success' => false,
				'errors' => $validator->getMessageBag()->toArray()
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
		$orderItem = OrderItem::find($id);
		if($orderItem){
			$order = Order::find($orderItem->order_id);
			if($order){
				$order->total -= $orderItem->price * $orderItem->quantity;
				$order->save();
				$orderItem->delete();
				
				return Response::json(array('success' => true, 'order_item' => $orderItem));

			}else{
				return Response::json(array('success' => false, 'message' => "Order not found"));
			}
			return Response::json(array('success' => false, 'message' => "OrderItem not found"));
		}
	}

	public function edit($id) { 
		$order = Order::find($id);
		$categories = Category::all(array('id','name'));
		return View::make('order.agregar', array('order' => $order,'categories'=>$categories));
	}

	public function items($id) {
		$order = Order::find($id);
		return View::make('order.items', array('order' => $order));
	}

}