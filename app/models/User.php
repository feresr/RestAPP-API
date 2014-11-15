<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $fillable = array('firstname', 'lastname', 'password');

	public static $rules = array(
		'firstname' => 'required|min:2',
		'lastname' => 'required|unique:users',
		'password' => 'required'
	);

	public static $messages = array(
		'firstname.required' => 'El nombre es obligatorio.',
		'firstname.min' => 'El nombre debe contener al menos dos caracteres.',
		'lastname.required' => 'El apellido es obligatorio.',
		'password.required' => 'El password es obligatorio.'
	);
	
	public static function validate($data, $id=null){
		$rules = self::$rules;
		$messages = self::$messages;
		return Validator::make($data, $rules, $messages);
	}


	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function orders($onlyActive = false){

		if($onlyActive){
			return $this->hasMany('Order')->where('active', true);
		}else{
			return $this->hasMany('Order');
		}
	}


}
