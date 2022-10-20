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
                "id" => $product->id,
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
    }
  
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);

            $html = "";
            if(isset($cart) && count($cart) > 0){
                foreach($cart as $details){
                   $html .= '<tr class="pt-30"><td class="custome-checkbox pl-30"><input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value=""><label class="form-check-label" for="exampleCheckbox1"></label></td><td class="image product-thumbnail pt-40"><img src="http://banttechenergies.com/images/products/'.$details['image'].'" alt="#"></td><td class="product-des product-name"><h6 class="mb-5"><a class="product-name mb-10 text-heading" href="#">'.$details['name'].'</a></h6><div class="product-rate-cover"><div class="product-rate d-inline-block"><div class="product-rating" style="width:90%"></div></div><span class="font-small ml-5 text-muted"> (4.0)</span></div></td><td class="price" data-title="Price"><h4 class="text-body">$'.$details['price'].' </h4></td><td class="text-center detail-info" data-title="Stock"><div class="detail-extralink mr-15"><div class="detail-qty border radius"><a class="qty-down"><i class="fi-rs-angle-small-down" onclick="increaseCartValue('.$details['id'].')"></i></a><input type="text" name="quantity" id="qty-value-'.$details['id'].'" class="qty-val" value="'.$details['quantity'].'"><a href="#" class="qty-up"><i class="fi-rs-angle-small-up" onclick="increaseCartValue('.$details['id'].')"></i></a></div></div> </td><td class="price" data-title="Price"><h4 class="text-brand">$'.$details['price'] * $details['quantity'].' </h4></td><td class="action text-center" data-title="Remove"><a class="text-body" onclick="deleteItem('.$details['id'].')"><i class="fi-rs-trash"></i></a></td></tr>';
                }
            }else{
                $html .= '<tr>Cart is Empty!</tr>';
            }
            
            echo json_encode(array($html, count($cart)));
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

            $html = "";
            if(isset($cart) && count($cart) > 0){
                foreach($cart as $details){
                   $html .= '<li><div class="shopping-cart-img"><a href="#"><img alt="Nest" src="http://banttechenergies.com/images/products/'.$details['image'].'" /></a></div><div class="shopping-cart-title"><h4><a href="#">'.$details['name'].'</a></h4><h4><span>'.$details['quantity'].' × </span>'.$details['price'].'</h4></div><div class="shopping-cart-delete"><a href="#"><i class="fi-rs-cross-small"></i></a></div></li>';
                }
            }else{
                $html .= '<li>Cart is Empty!</li>';
            }
            
            echo json_encode(array($html, count($cart)));
        }
    }
}
