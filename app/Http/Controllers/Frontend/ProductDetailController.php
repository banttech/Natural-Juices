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
    public function productDetail($id)
    {
        $product = Product::with('feature_img', 'category')->where('id', $id)->first();
        $relatedProducts = Product::with('feature_img')->where('prod_category', $product->category[0]->id)->whereNotIn('id', [$product->id])->get();
        $categories = Category::with('products')->get();

        return view('frontend.product_detail', compact('product', 'categories', 'relatedProducts'));
    }

}
