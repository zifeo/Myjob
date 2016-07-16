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

	/**
	 * Create a new publisher for email $email
	 */
	 public static function new_publisher($email) {
		$publisher = new Publisher;
		$publisher->contact_email = $email;
		$publisher->random_secret = str_random(32);
		$publisher->save();

		return $publisher;
	 }

	/**
	 * Generate a new secret for publisher with email $email
	 */
	public static function generate_new_secret($email) {
		// Delete old publiser
		$publisher = Publisher::where('contact_email', $email)->first();
		$publisher->delete();

		// Create new publisher with new secret
		$new_publisher = self::new_publisher($email);

		return $new_publisher->random_secret;
	}

	/**
	 * Check if publisher exists
	 */
	public static function exists($email) {
		return self::where('contact_email', '=', $email)->exists();
	}

	public static function get_valid_secret($email) {
		$model = self::where('contact_email', '=', $email)->first();

		return $model->random_secret;
	}

	public static function is_valid($secret, $email) {
		return $secret == self::get_valid_secret($email);
	}
}
