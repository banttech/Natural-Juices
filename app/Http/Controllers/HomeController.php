<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;

class HomeController extends Controller
{

    public function index()
    {
        return view('home.index');
    }
}
