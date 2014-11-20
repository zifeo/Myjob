<?php

class Ad extends Eloquent {

	protected $table = 'ads';
    protected $primaryKey = 'ad_id';
    protected $guarded = array('ad_id');
	protected $softDelete = true;

	/** Overrides create function **/
	public static function create(array $data)
	{
		$ad = new Ad;

		$ad->category_id = $data['category'];
		$ad->random_id = self::new_random_id();
		$ad->url = self::generate_url($data['title']);
		$ad->title = $data['title'];
		$ad->salary = 0;
		$ad->place = $data['place'];
		$ad->description = $data['description'];
		$ad->skills = $data['skills'];
		$ad->duration = $data['duration'];
		$ad->languages = $data['language'];
		$ad->contact_first_name = $data['contact-first-name'];
		$ad->contact_last_name = $data['contact-last-name'];
		$ad->contact_email = $data['contact-email'];
		$ad->contact_phone = $data['contact-phone'];
		$ad->start_at = strtotime($data['start-date']);
		$ad->contact_phone = strtotime($data['contact-phone']);
		$ad->expires_at = strtotime('now +15days');
		$ad->validated_at = null;
		$ad->save();

		return $ad;
	}

	/** Generates a new unique random id **/
	private static function new_random_id()
	{
		do{
			$new_random_id = str_random(32);
		} while(! self::random_id_is_unique($new_random_id));

		return $new_random_id;
	}

	/** Generates a new unique and readable url **/
	private static function generate_url($ad_name)
	{
		$new_url = snake_case($ad_name);
		$new_url = str_replace("_", "-", $new_url);

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

	private static function random_id_is_unique($id)
	{
		return DB::table('ads')
			->where('random_id', '=', $id)
			->count() == 0;
	}

	private static function url_is_unique($url)
	{
		return DB::table('ads')->where('url', '=', $url)->count() == 0;
	}
}