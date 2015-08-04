<?php

class Ad extends Eloquent {

	protected $table = 'ads';
    protected $primaryKey = 'url'; // only on Laravel not in the DB
    protected $guarded = array('ad_id');
	protected $softDelete = true;

	const N_WEEKS_AD_VALID = 2;

	/** Overrides create function **/
	public static function create(array $data)
	{
		$ad = new Ad;

		$new_url = self::generate_url($data['title']);

		$ad->category_id = $data['category_id'];
		$ad->random_secret = str_random(32);
		$ad->url = $new_url;
		$ad->title = $data['title'];
		$ad->salary = 0;
		$ad->place = self::nullable($data['place']);
		$ad->description = $data['description'];
		$ad->skills = self::nullable($data['skills']);
		$ad->duration = self::nullable($data['duration']);
		$ad->languages = self::nullable($data['languages']);
		$ad->contact_first_name = $data['contact_first_name'];
		$ad->contact_last_name = $data['contact_last_name'];
		$ad->contact_email = $data['contact_email'];
		$ad->contact_phone = self::nullable($data['contact_phone']);
		$ad->starts_at = date('Y-m-d', strtotime($data['starts_at']));

		if (array_key_exists('ends_at', $data)) {
			$ad->ends_at = date('Y-m-d', strtotime($data['ends_at']));
		}

		$ad->expires_at = Carbon::now()->addWeeks(self::N_WEEKS_AD_VALID)->toDateTimeString();
		$ad->save();
		
		return $new_url;
	}

	public static function get_valid_ads($fields)
	{
		return Ad::withCategories()->select($fields)
			->where('is_validated', '=', 1)
			->where('expires_at', '>', Carbon::now()->toDateTimeString());
	}


	public static function withCategories()
	{
		return Ad::join('categories', 'ads.category_id', '=', 'categories.category_id');
	}

	public function getDates()
	{
		return array_merge(parent::getDates(), ['starts_at', 'ends_at', 'validated_at']);
	}

	/** Generates a new unique and readable url **/
	private static function generate_url($ad_name)
	{
		$new_url = Str::slug($ad_name, "-");

		if(self::url_is_unique($new_url)) {

			return $new_url;

		// If url already exists, append a number
		} else {
			$i = 0;

			do {
				$new_url_num = $new_url . '-' . $i;
				$i++;
			} while(! self::url_is_unique($new_url_num));

			return $new_url_num;
		}
	}

	private static function url_is_unique($url)
	{
		return DB::table('ads')->where('url', '=', $url)->count() == 0;
	}

	private static function nullable($field)
	{
		if ($field == '') {
			return NULL;
		}
		else
		{
			return $field;
		}
	}
}
