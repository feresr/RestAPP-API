<?php
 class ReservaController extends BaseController {
    
    public function index(){
   		$reservas = Reserva::all(array('id','date','name','cantpersons'));
      return View::make('reservas.index', array('reservas' => $reservas));
    }
     public function lista() {
      $reservas = Reserva::all();
     return View::make('reservas.listres', array('reservas' => $reservas));
     }
    public function create() {
      $reserva = new Reserva();
      $title = 'Nueva';
      return View::make('reservas.save', array('reserva'=>$reserva, 'title'=>$title));
     }

    public function store() {
   $reserva = new Reserva();
   $reserva->date = Input::get('date');
   $reserva->name = Input::get('name');
   $reserva->cantpersons = Input::get('cantpersons');

   $validator = Reserva::validate(Input::all());
      if ($validator->fails())
      {
         return Response::json(array(
          'success' => false,
          'errors' => $validator->getMessageBag()->toArray()
      ));
      }else{
          $reserva->save();
          return Response::json(array(
            'success'     =>  true
        ));
      }     
}
    public function edit($id) {
    $reserva = Reserva::find($id);
    $title = 'Editar';
   return View::make('reservas.save', array('reserva'=>$reserva, 'title'=>$title));
     }
     
   public function update($id) { 
   $reserva = Reserva::find($id);
   $reserva->date = Input::get('date');
   $reserva->name = Input::get('name');
   $reserva->cantpersons = Input::get('cantpersons');
   $validator = Reserva::validate(Input::all(), $reserva->id);

   if($validator->fails()){
         return Response::json(array(
          'success' => false,
          'errors' => $validator->getMessageBag()->toArray()
      ));
   }else{
      $reserva->save();
          return Response::json(array(
            'success'     =>  true,
            'types' => 'edit'
        ));
   }
   }


 public function destroy($id) { 
   $reserva = Reserva::find($id);
   $reserva->delete();
   return Response::json(array(
        'success' => true,
        'message' => 'La reserva fue eliminada con éxito'
        ));
   }

  public function getReservas($id,$name){
    $reservas = DB::table('reservas_facebook')
                ->where('id_facebook', $id)
                ->orWhere('name', $name)
                ->select('id','name', 'fecha', 'cantidad')
                ->orderBy('fecha', 'desc')->get();

   return View::make('web.reserva', array('reservas' => $reservas));
 
  }

  public function reservasListado($reservas){
    return View::make('web.reserva', array('reservas' => $reservas));
  }

  public function storeFace() {
   $reserva = new FaceReserva();
   $reserva->fecha = Input::get('fecha');
   $reserva->name = Input::get('name');
   $reserva->id_facebook = Input::get('id_facebook');
   $reserva->cantidad = Input::get('cantpersons');

   $validator = FaceReserva::validate(Input::all());
      if ($validator->fails())
      {
         return Response::json(array(
          'success' => false,
          'errors' => $validator->getMessageBag()->toArray()
      ));
      }else{
          $reserva->save();
          return Response::json(array(
            'success'     =>  true
        ));
      }     
}

}