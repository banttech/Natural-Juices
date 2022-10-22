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
use Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::with('feature_img', 'category', 'user_details')->orderBy('id', 'desc')->get();
        $homePageAds = HomePageAds::all();
        $homePageOffer = HomePageOffer::first();
        $offerCategories = OfferCategory::with('offers', 'offers.offerImages')->get();

        $blogs = BlogPost::with('blog_category', 'user_details')->get();
        $categories = Category::all();

        return view('frontend.home', compact('products', 'homePageAds', 'homePageOffer', 'offerCategories', 'categories', 'blogs'));
    }

    public function filterByCategory(Request $request)
    {
        if($request->id == 'all'){
            $products = Product::with('feature_img', 'category', 'user_details')->orderBy('id', 'desc')->get();
        }else{
            $products = Product::with('feature_img', 'category', 'user_details')->where('prod_category', $request->id)->orderBy('id', 'desc')->get();
        }
        if(count($products) === 0){
            return false;
        }
        echo view('frontend.ajax_products', compact('products'));
    }

    public function organicFoodFederation()
    {
        return view('frontend.organic-food-federation');
    }

    public function usdaOrganic()
    {
        return view('frontend.usda-organic');
    }

    public function soilAssociationOrganic()
    {
        return view('frontend.soil-association-organic');
    }
}
