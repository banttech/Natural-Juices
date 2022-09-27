<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','feature_has_categories','feature_id','category_id');
    }
}
