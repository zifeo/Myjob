<?php

class Category extends Eloquent {
    protected $softDelete = true;
    protected $primaryKey = 'category_id';
    protected $hidden = ['created_at'];

    public static function get_id_name_mapping() {
        $locale = App::getLocale();

        if ($locale == 'en') {
            return Category::lists('name_en', 'category_id');
        } elseif ($locale == 'fr') {
            return Category::lists('name_fr', 'category_id');
        } else {
            /* Unsupported locale */
            App::abort(403);
        }
    }
    
}