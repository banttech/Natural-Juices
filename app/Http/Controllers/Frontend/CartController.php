<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class CartController extends Controller
{
    public function index()
    {
        return view('frontend.cart');
    }

    public function addToCart(Request $request)
    {
        $product = Product::with('feature_img')->findOrFail($request->id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$request->id])) {
            $cart[$request->id]['quantity']++;
        } else {
            $cart[$request->id] = [
                "name" => $product->prod_name,
                "quantity" => 1,
                "price" => $product->final_sel_price,
                "image" => $product->feature_img[0]->image_name,
            ];
        }
          
        session()->put('cart', $cart);

        $html = "";
        if(isset($cart) && count($cart) > 0){
            foreach($cart as $details){
               $html .= '<li><div class="shopping-cart-img"><a href="#"><img alt="Nest" src="http://banttechenergies.com/images/products/'.$details['image'].'" /></a></div><div class="shopping-cart-title"><h4><a href="#">'.$details['name'].'</a></h4><h4><span>'.$details['quantity'].' × </span>'.$details['price'].'</h4></div><div class="shopping-cart-delete"><a href="#"><i class="fi-rs-cross-small"></i></a></div></li>';
            }
        }else{
            $html .= '<li>Cart is Empty!</li>';
        }
        
        echo json_encode(array($html, count($cart)));

        // return ($html, count($cart));
    }
  
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
