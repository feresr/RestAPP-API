<?php
class Consulta extends Eloquent {

	protected $table = 'consultas';

protected $fillable = array('email', 'consulta');
//VALIDACIONES
    public static $rules = array(
      'email' => 'required||email',
      'consulta' => 'required|min:10',
   );


public static $messages = array(
      'email.required' => 'El email es obligatorio.',
      'email.email' => 'Debe ingresar un mail valido.',
      'consulta.required' => 'La consulta es obligatoria.',
      'consulta.min' => 'La consulta debe contener al menos 10 caracteres.',
   );

   public static function validate($data, $id=null){
      $reglas = self::$rules;
      $messages = self::$messages;
      return Validator::make($data, $reglas, $messages);
   }

}