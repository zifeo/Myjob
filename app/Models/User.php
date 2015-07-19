<?php

namespace Myjob\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract {

	use SoftDeletes;
	use Authenticatable;

	protected $table = 'users';
    protected $fillable = ['first_name', 'last_name', 'email'];
    protected $guarded = ['user_id', 'password'];
	protected $hidden = ['password'];
	protected $softDelete = true;
	protected $primaryKey = 'id';

	public static function sciperOrCreate($sciper) {
		
		$u = self::where("sciper", "=", $sciper)->get();
		
		if ($u->isEmpty()) {
			$u = new User;
			$u->sciper = $sciper;
			
			$u->save();
			$u->is_admin = $u->id == 1;
			
			return $u;
		} else {
			return $u->first();
		}
	}
}