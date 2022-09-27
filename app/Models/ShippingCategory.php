<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCategory extends Model
{
    use HasFactory;

    public function countries()
    {
        return $this->belongsToMany('App\Models\Country','shippingcategory_has_countries','shipping_category_id','country_id');
    }
}
