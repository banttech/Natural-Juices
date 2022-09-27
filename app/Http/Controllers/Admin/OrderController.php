<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(10);
        return view('admin.orders.view', compact('orders'));
    }

    public function orderDetails($id)
    {
        $ordersDetails = Order::with('items')->find($id);

        return view('admin.orders.details', compact('ordersDetails'));
    }
}
