<?php

namespace Myjob\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Log;

class Publisher extends Model {

	use SoftDeletes;

	protected $primaryKey = 'contact_email';
	protected $fillable = [
		'contact_email',
	];

	public static function generate_new_secret($email) {
		//TODO
		// Soft delete old secret
		// Generate new one
		// Return new one
	}

	public static function get_valid_secret($email) {
		$model = self::where('contact_email', '=', $email)->first();

		return $model->random_secret;
	}

	public static function is_valid($secret, $email) {
		return $secret == self::get_valid_secret($email);
	}
}
