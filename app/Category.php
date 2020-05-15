<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    public function products() {
        $this->hasMany('\App\Models\Product');
    }

    public function subcategories() {
       return $this->hasMany('\App\SubCategory', 'category_id');
    }
}
