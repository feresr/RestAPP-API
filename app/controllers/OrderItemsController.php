<?php

class OrderItemsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = OrderItem::get();
		return Response::json($orders);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$input = Input::get();
		$orderItem = new OrderItem();
		$orderItem->item_id = $input['item_id'];
		$orderItem->order_id = $input['order_id'];
		$orderItem->quantity = $input['quantity'];
		$orderItem->price = 2.4;
		$orderItem->save();

		return Response::json($orderItem);
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