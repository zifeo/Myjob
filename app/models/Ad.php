<?php

class Ad extends Eloquent {

	protected $table = 'ads';
    protected $primaryKey = 'url'; // only on Laravel not in the DB
    protected $guarded = array('ad_id');
	protected $softDelete = true;


}