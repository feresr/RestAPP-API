<?php

class Order extends Eloquent{

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
        return $this->belongsToMany('Item')->withPivot(array('quantity','price'));
    }

     //VALIDACIONES
    public static $rules = array(
        'user_id' => 'required',
        'table_id'=>'required'
    );

    public static function validate($data, $id=null){
        $reglas = self::$rules;
        return Validator::make($data, $reglas);
    }
}

