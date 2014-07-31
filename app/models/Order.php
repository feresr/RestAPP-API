<?php

class Order extends Eloquent{

    public static $messages = array(
        'table_id.required' => 'Debe ingresar una una mesa'
    );

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */  
    protected $table = 'orders';

    public function table()
    {
        return $this->belongsTo('Table');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function items()
    {
        return $this->belongsToMany('Item','order_item')->withPivot(array('quantity','price'));
    }

     //VALIDACIONES
    public static $rules = array(
        'table_id'=>'required'
    );

    public static function validate($data, $id=null){
        $rules = self::$rules;
        $messages = self::$messages;
        return Validator::make($data, $rules, $messages);
    }
}

