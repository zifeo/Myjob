<?php

class Ad extends Eloquent {

	protected $table = 'ads';
    protected $primaryKey = 'ad_id';
    protected $guarded = array('ad_id');
	protected $softDelete = true;


}