<?php

class OrderItem extends Eloquent{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'order_item';


	public function order()
	{
		return $this->hasOne('Order');
	}

	public function item()
	{
		return $this->hasOne('Item');
	}


	public static $rules = array(
		'item_id' => 'required',
		'quantity' => 'required|min:1'
	);

	public static $messages = array(
		'item_id.required'=> 'Ingresar un item es obligatorio.',
		'quantity.required'=> 'Ingresar la cantidad es obligatorio.',
		'quantity.min' => 'La cantidad no puede tener menos de uno.',
	);

	public static function validate($data, $id=null){
		$rules = self::$rules;
		$messages = self::$messages;
		return Validator::make($data, $rules, $messages);
	}

}