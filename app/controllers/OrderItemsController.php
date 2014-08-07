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
		$response = [];
		foreach ($orders as $order) {
			$itemsInOrder = OrderItem::where('order_id', '==', $order->id)->get()->toArray();
			array_merge($response,$itemsInOrder);
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
		$validator = OrderItem::::validate($input);

		if(!$validator->fails())
		{
			$orderItem = new OrderItem();
			$item = Item::find($input['item_id'], array('id','price'));
			$quantity = $input['quantity'];
			$total = $item->price * $quantity;
			$order->total += $total;
			$order->save();

			$orderItem = new OrderItem();
			$orderItem->item_id = $input['item_id'];
			$orderItem->order_id = $input['order_id'];
			$orderItem->quantity = $input['quantity'];
			$orderItem->price = $item->price;
			$orderItem->save();

			return Response::json(array(
				'success'     =>  true,
				'message'     =>  'Se agrego el item correctamente'
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

		$orderItem->delete();

		return Response::json($orderItem);
	}


/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('orderitem.create');
	}



}