<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Offer;
use App\Models\BlogPost;
use App\Models\HomePageAds;
use App\Models\HomePageOffer;
use App\Models\OfferCategory;
use App\Models\ProductsPack;
use Auth;

class ShopByCategoryController extends Controller
{
    public function index($slug)
    {
        $category = Category::where('url_slug', $slug)->first();
        $products = Product::with('feature_img', 'category')->where('prod_category', $category->id)->get();

        return view('frontend.shop_by_category', compact('products', 'category'));
    }

}
