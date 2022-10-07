<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function feature_img()
    {
        return $this->hasMany('App\Models\ProductHasImage');
    }

    public function category()
    {
        return $this->hasMany('App\Models\Category', 'id', 'prod_category');
    }
}
