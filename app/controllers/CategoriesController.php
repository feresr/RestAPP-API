<?php

class CategoriesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories  = Category::all();
		if (Request::wantsJson()){
			return Response::json($categories);
		}else{
			return View::make('categorias.index');
		}
	}

	public function mostrarCategorias(){
        $categories  = Category::all();

      if(count($categories) >= 1){
        return View::make('categorias.table', array('categories' => $categories));
      }
       return "No existen Categorias"; 
      }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$category = new Category();
		return View::make('categorias.save', array('category' => $category, 'titulo' => 'Nueva'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::get();
		$validator = Category::validate($input);

		if($validator->fails()){
			return Response::json(array(
			'success' => false,
			'errors' => $validator->getMessageBag()->toArray()
			));
		}

		$category = new Category();
		$category->name = $input['name'];
		$category->description = $input['description'];
		$category->save();
		return Response::json(array(
			'success' => true,
			'message'   =>  "La categoria se creó correctamente"
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
		$category = Category::find($id);
		return View::make('categorias.delete')->with('category', $category);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category = Category::find($id);
		return View::make('categorias.save', array('category' => $category, 'titulo' => 'Editar'));
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
		$category = Category::find($id);
		$validator = Category::validate($input, $category->id);
	
		if($validator->fails()){
			return Response::json(array(
			'success' => false,
			'errors' => $validator->getMessageBag()->toArray()
		));
		}

		$category->name = $input['name'];
		$category->description = $input['description'];
		$category->save();
		return Response::json(array(
			'success' => true,
			'message'   =>  "La categoria se editó correctamente"
		));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$category = Category::find($id);
		$category->delete();
		return Response::json(array(
        'success' => true,
        'message' => 'La categoria fue eliminada con éxito'
        ));
	}
}
