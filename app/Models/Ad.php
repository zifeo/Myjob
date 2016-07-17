<?php

namespace Myjob\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Log;
use Session;

class Ad extends Model {

	use SoftDeletes;

	protected $primaryKey = 'url';
	protected $fillable = [
		'title', 'category_id', 'place', 'description',
		'starts_at', 'ends_at', 'duration', 'salary', 'skills', 'languages',
		'contact_first_name', 'contact_last_name', 'contact_email', 'contact_phone',
	];

	const WEEK = 7 * 24 * 3600;


	public static function withCategories() {
		return self::join('categories', 'ads.category_id', '=', 'categories.category_id');
	}

	public static function withVisitors() {
		return Auth::guest() ? self::where('contact_email', '=', Session::get('connected_visitor')): new static;
	}

	public static function withCategoriesVisitors() {
		return Auth::guest() ? self::withCategories()->where('contact_email', '=', Session::get('connected_visitor')): self::withCategories();
	}

	// Overrides create function
	public static function create(array $data = []) {

		foreach (config('data.ad') as $field => $filters) {
			if (!isset($filters['required']) && isset($data[$field]))
				$data[$field] = self::nullable($data[$field]);
		}

		if (isset($data['starts_at'], $data['ends_at']) && $data['starts_at'] == $data['ends_at'])
			$data['ends_at'] = null;

		$ad = new Ad($data); // mass-alignement allowed on fillable
		assert(isset($ad->title), "Create without all datas.");
		$url = self::generate_url($ad->title);

		$ad->url = $url;
		$ad->random_secret = str_random(32);
		$ad->expires_at = formatDate(time() + config('myjob.ads.validityWeeks') * self::WEEK);

		$ad->save();
		$ad->url = $url; // reset $ad->url as it is only the primary key in Laravel and was altered by save
		Log::info('Ad ' . e($ad->title) . ' created.');
		return $ad;
	}

	public function fill(array $data) {

		foreach (config('data.ad') as $field => $filters) {
			if (!isset($filters['required']) && isset($data[$field]))
				$data[$field] = self::nullable($data[$field]);
		}

		if (isset($data['starts_at'], $data['ends_at']) && $data['starts_at'] == $data['ends_at'])
			$data['ends_at'] = null;

		if (isset($data['description']))
			$data['description'] = self::prettyText($data['description']);

		if (isset($data['contact_phone']))
			$data['contact_phone'] = self::prettyPhone($data['contact_phone']);

		return parent::fill($data);
	}

	public static function acceptedAd($fields) {
		return Ad::withCategoriesVisitors()->select($fields)
			->whereNotNull('validated_at')
			->where('expires_at', '>', date('Y-m-d H:i:s'))
			->where('validated', '=', true);
	}

	public function getDates() {
		return array_merge(parent::getDates(), ['starts_at', 'ends_at', 'validated_at']);
	}

	// Return TRUE if visitor has rights to see the ad
	public function canBeSeen() {
		return Auth::check() || (Session::has('connected_visitor') && Session::get('connected_visitor') == $this->contact_email);
	}

	/** Generates a new unique and readable url **/
	private static function generate_url($ad_name) {
		$new_url = Str::slug($ad_name, "-");

		if (self::url_is_unique($new_url))
			return $new_url;

		$i = 0;
		do {
			$new_url_num = $new_url . '-' . $i;
			$i++;
		} while (!self::url_is_unique($new_url_num));

		return $new_url_num;
	}

	private static function url_is_unique($url) {
		return self::where('url', '=', $url)->count() == 0;
	}

	private static function nullable($field) {
		return isset($field) && !empty($field) ? $field: null;
	}

	private static function prettyText($text) {
		if (substr($text, -1) != '.') $text .= '.';
		return ucfirst($text);
	}

	private static function prettyPhone($phone) {

		$phone = str_replace(' ', '', $phone);
		$formated = '';
		$length = strlen($phone);
		$index = 0;

		if (substr($phone, 0, 1) == '+') { // +4121.. -> +41 22 ..
			$formated .= '+' . substr($phone, 1, 2) . ' ' . substr($phone, 3, 2) . ' ';
			$index = 5;
		} else if (substr($phone, 0, 2) == '00') { // 004121.. -> +41 22 ..
			$formated .= '+' . substr($phone, 2, 2) . ' ' . substr($phone, 4, 2) . ' ';
			$index = 4;
		} else { // 021.. -> 021 ..
			$formated .= substr($phone, 0, 3) . ' ';
			$index = 3;
		}

		// 3-chunk
		$formated .= substr($phone, $index, 3) . ' ';
		$index += 3;

		// chunk by 2
		while ($length >= $index) {
			$formated .= substr($phone, $index, 2) . ' ';
			$index += 2;
		}

		assert(strlen($phone) == strlen(str_replace(' ', '', $formated)));
		return trim($formated);
	}
}
