<?php

class Category extends Eloquent {
    protected $softDelete = true;
    protected $primaryKey = 'category_id';
    protected $hidden = ['created_at'];
}