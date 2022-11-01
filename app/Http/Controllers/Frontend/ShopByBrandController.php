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

class ShopByBrandController extends Controller
{
    public function index($slug)
    {
        $brand = Brand::where('url_slug', $slug)->first();
        $products = Product::with('feature_img', 'category')->where('prod_brand', $brand->id)->get();

        return view('frontend.shop_by_brand', compact('products', 'brand'));
    }

}
