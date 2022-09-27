<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddOrderRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Session;
use Stripe;

class CheckOutController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $grandTotal = $this->grandTotal();
        return view('frontend.checkout', compact('categories', 'grandTotal'));
    }

    public function placeorder(AddOrderRequest $request)
    {
        $user = Auth::user();
        $grand_total = $this->grandTotal();
        $order = new Order;
        $order->user_id = 1;
        $order->grand_total = $grand_total;
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->email = $request->email;
        $order->phone_number = $request->phone_number;
        $order->country = $request->country;
        $order->state = $request->state;
        $order->address = $request->address;
        $order->post_code = $request->post_code;
        $order->save();

        $this->orderItems($order->id);

        return redirect('/')->with('flash_message_success','Record Added Successfully');
    }

    public function orderItems($orderId)
    {
        $cart = session()->get('cart');

        foreach ($cart as $key => $item) {
            $orderItem = new OrderItem;
            $orderItem->quantity = $item['quantity'];
            $orderItem->price = $item['price'];
            $orderItem->order_id = $orderId;
            $orderItem->product_id = $item['product_id'];

            $orderItem->save();
        }
        Session::put('cart', []);

        return;
    }

    public function grandTotal()
    {
        $grand_total = 0;
        $cart = session()->get('cart');
        foreach ($cart as $key => $item) {
            $grand_total += $item['price'] * $item['quantity'];
        }
        return $grand_total;
    }
}
