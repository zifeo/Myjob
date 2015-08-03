<?php

namespace Myjob\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Log, Auth;

class Ad extends Model {

	use SoftDeletes;

    protected $primaryKey = 'url';
	protected $fillable = [
		'title', 'category_id', 'place', 'description',
		'starts_at' ,'ends_at','duration', 'salary', 'skills', 'languages',
		'contact_first_name', 'contact_last_name', 'contact_email', 'contact_phone'
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
	public static function create(array $data = [])
	{

		foreach (config('data.ad') as $field => $filters) {
			if (! isset($filters['required']))
				$data[$field] = self::nullable($data[$field]);
		}

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

	public static function acceptedAd($fields)
	{
		return Ad::withCategoriesVisitors()->select($fields)
			->whereNotNull('validated_at')
			->where('expires_at', '>', date('Y-m-d'))
			->where('validated', '=', true);
	}

	public function getDates()
	{
		return array_merge(parent::getDates(), ['starts_at', 'ends_at', 'validated_at']);
	}

	/** Generates a new unique and readable url **/
	private static function generate_url($ad_name)
	{
		$new_url = Str::slug($ad_name, "-");

		if (self::url_is_unique($new_url))
			return $new_url;

		$i = 0;
		do {
			$new_url_num = $new_url . '-' . $i;
			$i++;
		} while(! self::url_is_unique($new_url_num));

		return $new_url_num;
	}

	private static function url_is_unique($url) {
		return self::where('url', '=', $url)->count() == 0;
	}

	private static function nullable($field) {
		return isset($field) && ! empty($field) ? $field: null;
	}
}
