<?php

use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface {

	protected $table = 'users';
    protected $fillable = array('first_name', 'last_name', 'email');
    protected $guarded = array('id', 'password');
	protected $hidden = array('password');
	protected $softDelete = true;
	protected $primaryKey = 'user_id';


	public static function sciperOrCreate($sciper) {
		
		$u = self::where("sciper", "=", $sciper)->get();
		
		if ($u->isEmpty()) {
			$u = new User;
			$u->sciper = $sciper;
			
			$u->save();
			$u->is_admin = $u->user_id == 1;
			$u->save();
			
			return $u;
		} else {
			return $u->first();
		}
	}
	
	public function casualName() {
		return strtok($this->first_name, ' ');
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		//return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		//return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		//return $this->email;
	}

	public function getRememberToken() {
		
	}
	
	public function setRememberToken($value) {
		
	}
	
	public function getRememberTokenName() {
		
	}


}