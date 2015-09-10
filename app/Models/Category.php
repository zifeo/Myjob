<?php

namespace Myjob\Models;

use App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Log;

class Category extends Model {

	use SoftDeletes;

	protected $primaryKey = 'category_id';

	public static function get_id_name_mapping() {
		return self::lists('name_' . App::getLocale(), 'category_id');
	}

}