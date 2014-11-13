<?php

/*use Illuminate\Auth\UserInterface; implements UserInterface, RemindableInterface
use Illuminate\Auth\Reminders\RemindableInterface;*/

class User extends Eloquent {

	protected $table = 'users';
    protected $fillable = array('first_name', 'last_name', 'email');
    protected $guarded = array('id', 'password');
	protected $hidden = array('password');
	protected $softDelete = true;

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	/*public function getAuthIdentifier()
	{
		return $this->getKey();
	}*/

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	/*public function getAuthPassword()
	{
		return $this->password;
	}*/

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	/*public function getReminderEmail()
	{
		return $this->email;
	}*/

}