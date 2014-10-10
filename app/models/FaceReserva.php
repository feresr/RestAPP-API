<?php
class FaceReserva extends Eloquent{
   
protected $table = 'facereservas';

  public static $rules = array(
          'date' => 'required|date',
          'name' => 'required|min:2',
      );
          
   public static $messages = array(
          'date.required'=> 'Ingresar una fecha es obligatorio.',
          'date.date'=> 'Ingresar una fecha.',
          'name.required'=> 'Ingresar el nombre es obligatorio.',
          'name.min' => 'El nombre no puede tener menos de dos caracteres.',
      );

      public static function validate($data, $id=null){
      $reglas = self::$rules;
      $messages = self::$messages;
      return Validator::make($data, $reglas, $messages);
   }
   }