<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class UserDashboardController extends Controller
{
    public function index()
    {
        $active = 'dashboard';
        return view('frontend.dashboard.index', compact('active'));
    }

    public function myProfile()
    {
        $active = 'profile';
        return view('frontend.dashboard.profile', compact('active'));
    }

    public function changePassword()
    {
        $active = 'change_pass';
        return view('frontend.dashboard.changePassword', compact('active'));
    }

    public function manageAddress()
    {
        $active = 'manage_address';
        $countries = Country::all();
        return view('frontend.dashboard.manageAddress', compact('countries', 'active'));
    }

    public function myOrders()
    {
        $active = 'my_orders';
        return view('frontend.dashboard.myOrders', compact('active'));
    }

    public function invoice($invoice_number)
    {
        return view('frontend.dashboard.invoice', compact('invoice_number'));
    }

}
