<?php

class SessionsController extends BaseController {

	public $restful = true;

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	
	public function create(){

		return View::make('sessions.create');

	}

	//POST api/v1/sessions
	public function store()
	{

		$input = Input::all();

		$attempt = Auth::attempt(array(
			'username' => $input['username'],
			'password' => $input['password']
		));

		if($attempt){
		if (Request::wantsJson())
		{
			return Auth::User();
		}else{
			return Response::json(array(
			'success' => true,
			));
		}
			
		}else{
			return null;
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	//DELETE api/v1/sessions/{somnumber}
	public function destroy()
	{
		Auth::logout();
		return Response::json(array('action'=>'logout', 'status' => 'success'));
	}


}
