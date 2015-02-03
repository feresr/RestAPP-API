<?php
class FaceReserva extends Eloquent{
   
protected $table = 'reservas_facebook';

  public static $rules = array(
          'fecha' => 'required|date',
          'name' => 'required|min:2',
          'cantidad' =>'required|numeric'
      );
          
   public static $messages = array(
          'fecha.required'=> 'Ingresar una fecha es obligatorio.',
          'fecha.date'=> 'Ingresar una fecha.',
          'name.required'=> 'Ingresar el nombre es obligatorio.',
          'name.min' => 'El nombre no puede tener menos de dos caracteres.',
          'cantidad.required'=> 'Debe ingresar una cantidad.',
          'cantidad.numeric' => 'La cantidad debe ser numerica.'
      );

      public static function validate($data, $id=null){
      $reglas = self::$rules;
      $messages = self::$messages;
      return Validator::make($data, $reglas, $messages);
   }
   }