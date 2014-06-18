<?php


class Table extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tables';

	public function orders(){
		return $this->hasMany('Order');
	}

	//VALIDACIONES
	public static $rules = array(
		'number' => 'required|numeric',
		'quantity' => 'required|numeric'
	);


	public static $messages = array(
		'number.required' => 'El numero es obligatorio.',
		'number.numeric' => 'El debe ser un numerico.',
		'number.unique' => 'El numero pertenece a otra mesa.',
		'quantity.required' => 'La cantidad es obligatorio.',
		'quantity.numeric' => 'La cantidad debe se un numero.',     
	);

	public static function validate($data, $id=null){
		$reglas = self::$rules;
		$messages = self::$messages;
		return Validator::make($data, $reglas, $messages);
	}

}
