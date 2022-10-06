<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferCategory extends Model
{
    use HasFactory;

    public function offers()
    {
        return $this->hasMany('App\Models\Offer','offer_category','name');
    }

}
