<?php
 class ReservaController extends BaseController {
    
    public function index(){
   		//$reservas = Reserva::all(array('id','date','name','cantpersons'));
      return View::make('reservas.index');
    }

    public function mostrarReservas(){
        $reservas = DB::table('reservas')
                    ->select('id','date','name', 'cantpersons')
                    ->orderBy('date', 'desc')->get();

      if(count($reservas) >= 1){
        return View::make('reservas.table', array('reservas' => $reservas));
      }
       return "No existen Reservas realizadas"; 
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
            'success'     =>  true,
            'message'   =>  "La reserva se realizó correctamente"
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
            'message'   =>  "La reserva se modifico correctamente"
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

public function faceDestroy($id) { 
   $reserva = FaceReserva::find($id);
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
                ->select('id','id_facebook','name', 'fecha', 'cantidad')
                ->orderBy('fecha', 'desc')->get();

  if(count($reservas) >= 1){
    return View::make('web.reserva', array('reservas' => $reservas));
  }
   return "No tiene Reservas realizadas"; 
  }

  public function reservasListado($reservas){
    return View::make('web.reserva', array('reservas' => $reservas));
  }

  public function storeFace() {
   $reserva = new FaceReserva();
   $reserva->fecha = Input::get('fecha');
   $reserva->name = Input::get('name');
   $reserva->id_facebook = Input::get('id_facebook');
   $reserva->cantidad = Input::get('cantidad');

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
            'success'   =>  true,
            'message'   =>  "La reserva se realizó correctamente"
        ));
      }     
}

  public function updateFace($id) {
   $reserva = FaceReserva::find($id);
   $reserva->fecha = Input::get('fecha');
   $reserva->name = Input::get('name');
   $reserva->id_facebook = Input::get('id_facebook');
   $reserva->cantidad = Input::get('cantidad');

   $validator = FaceReserva::validate(Input::all(), $reserva->id);

      if ($validator->fails())
      {
         return Response::json(array(
          'success' => false,
          'errors' => $validator->getMessageBag()->toArray()
      ));
      }else{
          $reserva->save();
          return Response::json(array(
            'success'  =>  true,
            'message'  =>  "La reserva se modifico correctamente." 
        ));
      }     
}

}