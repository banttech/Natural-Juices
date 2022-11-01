<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\BlogPost;

class BlogController extends Controller
{
    public function singleCategoryBlog($id)
    {
        $blogs = BlogPost::where('category', $id)->get();
        return view('frontend.blog_list', compact('blogs'));
    }
}
