<?php

class ItemsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Request::wantsJson())
		{
			$items = Item::get();
			return Response::json($items);
		}else{
			$categories = Category::all(array('id','name'));
			return View::make('item.index', array('categories'=> $categories));
		}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$item = new Item();
		$categories = Category::all(array('id','name'));
		return View::make('item.save', array('item' => $item, 'categories'=> $categories));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::get();

		$validator = Item::validate($input);

		if ($validator->fails()){
			return Response::json(array(
			'success' => false,
			'errors' => $validator->getMessageBag()->toArray()
			));
		}
		else
		{
			$item = new Item();
			$item->name = $input['name'];
			$item->description = $input['description'];
			$item->price = $input['price'];
			$item->category_id = $input['category_id'];  
			$item->save();
			return Response::json(array(
			'success' => true
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
		$item = Item::find($id);
		if (Request::wantsJson())
		{
			return Response::json($item);
		}else{
			return View::make('item.delete', array('item' => $item));
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
		$item = Item::find($id);
		$categories =Category::all(array('id','name'));
		return View::make('item.save', array('item' => $item, 'categories'=> $categories));
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
		$item = Item::find($id);

		$validator = Item::validate($input, $item->id);
		if ($validator->fails()){
			return Response::json(array(
			'success' => false,
			'errors' => $validator->getMessageBag()->toArray()
			));
		}else{

			$item->name = $input['name'];
			$item->description = $input['description'];
			$item->price = $input['price'];
			$item->category_id = $input['category_id'];
			$item->save();
			return Response::json(array(
			'success' => true,
			'types' => 'edit'
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
		//TODO: WILL BE UPDATED
		$item = Item::find($id);
		$item->delete();
		return Redirect::to('items')->with('notice', 'El Item ha sido eliminado correctamente.');
	}


}