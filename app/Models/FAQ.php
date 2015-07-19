<?php

namespace Myjob\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model {
	
	use SoftDeletes;
	
    protected $table = 'faq';
    protected $softDelete = true;

}