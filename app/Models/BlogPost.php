<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    public function blog_category()
    {
        return $this->hasOne('App\Models\BlogCategory','id','category');
    }
}
