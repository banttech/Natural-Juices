<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('frontend.dashboard.index');
    }

    public function myProfile()
    {
        return view('frontend.dashboard.profile');
    }

    public function changePassword()
    {
        return view('frontend.dashboard.changePassword');
    }

    public function manageAddress()
    {
        $countries = Country::all();
        return view('frontend.dashboard.manageAddress', compact('countries'));
    }

}
