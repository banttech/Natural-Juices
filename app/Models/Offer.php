<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    
    public function category()
    {
        return $this->hasOne('App\Models\OfferCategory', 'id', 'offer_category_id');
    }    

    public function offerImages()
    {
        return $this->hasMany('App\Models\OfferHasImage', 'offer_id', 'id');
    }
}
