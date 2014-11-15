<?php
class Reserva extends Eloquent{
   
protected $table = 'reservas';

  public static $rules = array(
          'date' => 'required|date',
          'name' => 'required|min:2',
          'cantpersons' => 'required|min:1'
      );
          
   public static $messages = array(
          'date.required'=> 'Ingresar una fecha es obligatorio.',
          'date.date'=> 'Ingresar una fecha.',
          'name.required'=> 'Ingresar el nombre es obligatorio.',
          'name.min' => 'El nombre no puede tener menos de dos caracteres.',
          'cantpersons.required' => 'Debe ingesar una cantidad',
          'cantpersons.min' => 'Debe ser al menos una persona'
      );

      public static function validate($data, $id=null){
      $reglas = self::$rules;
      $messages = self::$messages;
      return Validator::make($data, $reglas, $messages);
   }
   }