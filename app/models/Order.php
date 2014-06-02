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
        return $this->belongsToMany('Item','order_item');
    }


}
