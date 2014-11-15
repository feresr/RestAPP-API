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

		if (!$attempt) {
			//Por seguridad, en el caso que el usuario esté logeado
			//pero de algun modo se re loggea
			//con credenciales incorrectas, lo desloggeamos.
			Auth::logout();
		}

		return Response::json(array(
			'success' => $attempt,
			'message' => $attempt? 'Successful login' : 'Invalid credentials',
			'user' => Auth::User()
		));
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
