<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Order;
use Auth;


class DashboardController extends Controller
{
    public function index(Request $request)
    {   
        $active = 'dashboard';

        // dd(Auth::user()->hasRole->name('Admin'));
        // if(Auth::user()->role == 'admin'){
        //     echo 'yes';die();
        // }
        // echo 'yes';die(Auth::user()->roles()->get());
        if (Auth::user()->hasRole('Admin')){
            echo 'yes';die();
        }
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        $totalOrders = Order::count();

        return view('admin.dashboard', compact('totalCategories', 'totalProducts', 'totalOrders','active'));
    }
}
