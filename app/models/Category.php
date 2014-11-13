<?php

class Category extends Eloquent {
	protected $softDelete = true;
	protected $hidden = ['created_at'];
}