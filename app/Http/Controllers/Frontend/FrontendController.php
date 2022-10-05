<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\HomePageAds;
use App\Models\HomePageOffer;
use App\Models\OfferCategory;
use Auth;

class FrontendController extends Controller
{
    public function index()
    {
        // dd(Auth::id());
        $products = Product::all();
        $homePageAds = HomePageAds::all();
        $homePageOffer = HomePageOffer::first();
        // $offerCategories = OfferCategory::with('offers')->get();

        // dd($offerCategories);

        return view('frontend.home', compact('products', 'homePageAds', 'homePageOffer'));
    }

    public function filterByCategory($catId)
    {
        $categories = Category::all();
        $products = Product::where('category_id', $catId)->get();

        return view('frontend.home', compact('categories', 'products'));
    }
}
