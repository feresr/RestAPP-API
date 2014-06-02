<?php


class Table extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tables';

	/**
	 * Get the password for the user.
	 *
	 * @return integer
	 */
	public function getNumber()
	{
		return $this->remember_token;
	}
	/**
	 * Get the password for the user.
	 *
	 * @return integer
	 */
	public function getSeats()
	{
		return $this->remember_token;
	}
	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

}
