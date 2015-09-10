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

	public static function get_outdated_secrets($email) {
		$models = self::where('contact_email', '=', $email)
			->where('created_at', '<', formatDate(strtotime('-' . config('myjob.providers.secretValidityWeeks') . ' weeks')))->get();

		return self::secrets_from_models($models);
	}

	public static function get_valid_secrets($email) {
		$models = self::where('contact_email', '=', $email)
			->where('created_at', '>=', formatDate(strtotime('-' . config('myjob.providers.secretValidityWeeks') . ' weeks')))->get();

		return self::secrets_from_models($models);
	}

	public static function is_valid($secret, $email) {
		return in_array($secret, self::get_valid_secrets($email));
	}

	public static function is_outdated($secret, $email) {
		return in_array($secret, self::get_outdated_secrets($email));
	}

	private static function secrets_from_models($models) {
		$secrets = [];

		foreach ($models as $model) {
			array_push($secrets, $model->random_secret);
		}

		return $secrets;
	}
}