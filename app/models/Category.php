<?php


class Category extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $category = 'categories';

	/**
	 * Get the password for the user.
	 *
	 * @return integer
	 */
	public function getName()
	{
		return $this->name;
	}


}
