<?php

class Item extends Eloquent {

	protected $fillable = array('descripcion', 'price', 'category_id');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'items';

	public function orders() {
		return $this->belongsToMany('Order');
	}

	public function category() {
		return $this->belongsTo('Category');
	}

	//VALIDACIONES
	public static $rules = array(
		'name' => 'required|min:4',
		'price'=>'required',
		'category_id'=>'required|numeric'
	);

	public static function validate($data, $id=null){
		$reglas = self::$rules;
		return Validator::make($data, $reglas);
	}
}