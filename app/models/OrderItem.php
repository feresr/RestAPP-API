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
}