<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
      
        $request = $request->all();

        if(isset($request['name'])){

            $employees = Employee::search($request['name'])->get();
           
        }else{
            $employees = Employee::get();   
        }

        return response()->json([
            'data' => $employees
        ]);
       
    }
}
