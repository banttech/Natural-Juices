<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartOffer extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','brand_has_categories','brand_id','category_id');
    }
}
