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
		$ad->random_id = self::new_random_id();
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
		$ad->start_at = strtotime($data['starts_at']);
		$ad->contact_phone = strtotime($data['contact_phone']);
		$ad->expires_at = strtotime('now +15days');
		$ad->validated_at = null;
		$ad->save();

		return $new_url;
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
		$new_url = str_replace(" ", "-", $ad_name);
		$new_url = strtolower($new_url);

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