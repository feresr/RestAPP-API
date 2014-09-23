<?php

class HomeController extends BaseController {

   	public function index()
	{
    $consulta = new Consulta();
    $reserva = new FaceReserva();
		return View::make('web.index', array('consulta' => $consulta, 'reserva' => $reserva));
	}
      public function store()
  {
      $consulta = new Consulta();
      $consulta->email = Input::get('email');
      $consulta->consulta = Input::get('consulta');
      
      $validator = Consulta::validate(Input::all());
   if($validator->fails()){
         return Response::json(array(
          'success' => false,
          'errors' => $validator->getMessageBag()->toArray()
      ));
   }else{
      $consulta->save();
          return Response::json(array(
            'success'     =>  true
        ));
   }
  }
	public function indexAdmin() {
    $users = User::all(array('id', 'firstname', 'lastname' ));
    $orders = Order::all()->count();
    return View::make('inicio',array('users'=> $users, 'orders'=>$orders));
   }

}
