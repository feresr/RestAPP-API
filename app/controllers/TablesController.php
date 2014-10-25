<?php

class TablesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Request::wantsJson())
		{
			$tables = Table::all();
			return Response::json($tables);
		}else{
		$coords = Coord::all();
		return View::make('table.index', array('coords' => $coords));
		}
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function editPosition()
	{
		if (Request::wantsJson())
		{
			$tables = Table::all();
			return Response::json($tables);
		}else{
		$coords = Coord::all();
		return View::make('table.mesas', array('coords' => $coords));
		}
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
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
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */	
	public function create()
	{
		$table = new Table();
		$title = "Nueva";
		return View::make('table.save', array('table' => $table, 'title' => $title));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::get();
		$validator = Table::validate($input);

		if($validator->fails()){
		return Response::json(array(
			'success' => false,
			'errors' => $validator->getMessageBag()->toArray()
		));
		}
		$table = new Table();
		$table->number = $input['number'];
		$table->seats = $input['seats'];
		$table->description = $input['description'];
		$table->taken = false;
		$table->save();

		$coord = new Coord();
		$coord->table_id = $table->id;
		$coord->x_pos = '10';
		$coord->y_pos = '10';
		$coord->save();

		return Response::json(array(
			'success' => true
		));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$table = Table::find($id);
		if (Request::wantsJson())
		{
			return Response::json($table);
		}else{
			return View::make('table.show', array('table' => $table));
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
		$table = Table::find($id);
		$title = "Editar";
		return View::make('table.save', array('table' => $table, 'title' => $title));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$table = Table::find($id);
		$input = Input::get();

		$validator = Table::validate($input, $table->id);
		if($validator->fails()){
			return Response::json(array(
				'success' => false,
				'errors' => $validator->getMessageBag()->toArray()
			));
		}else{
			$table->number = $input['number'];
			$table->seats = $input['seats'];
			$table->description = $input['description'];
			$table->save();
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
	public function delete($id)
	{
		$table = Table::find($id);
		if (Request::wantsJson())
		{
			return Response::json($table);
		}else{
			return View::make('table.delete', array('table' => $table));
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
		$table = Table::find($id);
		$table->delete();
		return Redirect::to('tables')->with('notice', 'La mesa ha sido eliminada correctamente.');
	}
}
