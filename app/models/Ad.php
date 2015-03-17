<?php

class Ad extends Eloquent {

	protected $table = 'ads';
    protected $primaryKey = 'url'; // only on Laravel not in the DB
    protected $guarded = array('ad_id');
	protected $softDelete = true;

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
		$ad->place = $data['place'];
		$ad->description = $data['description'];
		$ad->skills = $data['skills'];
		$ad->duration = $data['duration'];
		$ad->languages = $data['languages'];
		$ad->contact_first_name = $data['contact_first_name'];
		$ad->contact_last_name = $data['contact_last_name'];
		$ad->contact_email = $data['contact_email'];
		$ad->contact_phone = $data['contact_phone'];
		$ad->starts_at = date('Y-m-d', strtotime($data['starts_at']));

		if (array_key_exists('ends_at', $data)) {
			$ad->ends_at = date('Y-m-d', strtotime($data['ends_at']));
		}

		$ad->expires_at = date('Y-m-d', strtotime('+15 days'));
		$ad->save();
		
		return $new_url;
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
}
