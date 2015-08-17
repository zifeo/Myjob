<?php

namespace Myjob\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Log, App;

class Category extends Model {
	
	use SoftDeletes;
	
    protected $primaryKey = 'category_id';

    public static function get_id_name_mapping() {
        return self::lists('name_' . App::getLocale(), 'category_id');
    }
    
}