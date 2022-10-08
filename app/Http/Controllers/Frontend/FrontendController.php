<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Offer;
use App\Models\HomePageAds;
use App\Models\HomePageOffer;
use App\Models\OfferCategory;
use Auth;

class FrontendController extends Controller
{
    public function index()
    {
        // dd(Auth::id());
        $products = Product::with('feature_img', 'category')->orderBy('id', 'desc')->get();
        $homePageAds = HomePageAds::all();
        $homePageOffer = HomePageOffer::first();
        $offers = Offer::with('offerImages')->where('status', 'active')->get();
        $categories = Category::all();

        // dd($products);

        return view('frontend.home', compact('products', 'homePageAds', 'homePageOffer', 'offers', 'categories'));
    }

    public function filterByCategory(Request $request)
    {
        if($request->id == 'all'){
            $products = Product::with('feature_img', 'category')->get();
        }else{
            $products = Product::with('feature_img', 'category')->where('prod_category', $request->id)->get();
        }
        echo view('frontend.ajax_products', compact('products'));
    }
}
