<?php


class Item extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'items';

	public function orders()
    {
        return $this->belongsToMany('Order');
    }

}
