<?php

namespace Myjob\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FAQ extends Model {

	use SoftDeletes;

	protected $table = 'faq';

}