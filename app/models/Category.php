<?php

class Category extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $category = 'categories';


	public function getName() {
		return $this->name;
	}

	public function items() {
		return $this->hasMany('Item');
	}


	//VALIDACIONES
	public static $rules = array(
		'name' => 'required|min:2'
	);

	public static function validate($data, $id=null) {
		$reglas = self::$rules;
		$messages = self::$messages;
		return Validator::make($data, $reglas, $messages);
	}
}
