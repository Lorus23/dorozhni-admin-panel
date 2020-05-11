<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    public static function storeCategory($category_name)
    {
        $category = new Category();
        $category->category_name = $category_name;
        return $category ->save();
    }

}
