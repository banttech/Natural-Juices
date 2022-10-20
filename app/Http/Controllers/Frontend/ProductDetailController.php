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

class ProductDetailController extends Controller
{
    public function productDetail($slug)
    {
        $product = Product::with('feature_img', 'category')->where('url_slug', $slug)->first();
        $relatedProducts = Product::with('feature_img')->where('prod_category', $product->category[0]->id)->whereNotIn('id', [$product->id])->skip(0)->take(3)->get();
        // $categories = Category::with('products')->get();

        // dd($product);

        return view('frontend.product_detail', compact('product', 'relatedProducts'));
    }

    public function allProducts()
    {
        $products = Product::with('feature_img', 'category')->get();

        return view('frontend.product_list', compact('products'));
    }

}
