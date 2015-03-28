<?php

class Category extends Eloquent {
    protected $softDelete = true;
    protected $primaryKey = 'category_id';
    protected $hidden = ['created_at'];

    public static function get_category_names() {
        $categories = Category::all();

        $category_name_map = [];

        foreach ($categories as $category) {
            $category_name_map[$category->category_id] = $category->name; 
        }

        return $category_name_map;
    }
    
}