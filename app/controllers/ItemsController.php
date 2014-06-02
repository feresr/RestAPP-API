<?php

class ItemsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$itemsRow  = Item::all();



		$items = array();

		foreach($itemsRow as $item){

			$item = array(
					'id' 			=> 	$item->id,
					'name' 			=>	$item->name,
					'description'	=> 	$item->description,
					'price'			=> 	$item->price,
					'category_id' 	=> 	$item->category_id
				);

			array_push($items, $item);

		}


		return Response::json(array('action'=>'fetch-items', 'status' => 'success', 'items' => $items));

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
		//
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
