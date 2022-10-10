<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use DB;


class CustomerController extends Controller
{
    public function index() 
    {
        $active = 'customers';
        $inputValue = "";
        $searchDate = "";
        $customers = User::with('orders')->paginate(10);

        return view('admin.customers.view', compact('active', 'customers', 'inputValue', 'searchDate'));
    }


    public function delete($id) 
    {
        $customer = User::where('id', $id)->first();
        $customer->delete();

        return redirect('viewCustomers')->with('flash_message_success','Record Deleted Successfully');
    }

    public function search(Request $request)
    {
        $active = 'customers';
        $inputValue = $request->input_value ?? "";
        $searchDate = $request->search_by_date ?? "";
        $customers = User::with('orders');

        if($inputValue !== ''){
            $customers->where('name', 'LIKE', '%' . $inputValue . '%')->orWhere('email','LIKE','%'.  $inputValue .'%');
        }

        if($searchDate !== ''){
            $customers->whereDate('created_at', '>=', $request->search_by_date);
        }

        $customers = $customers->paginate(10);


        return view('admin.customers.view', compact('active', 'customers', 'inputValue', 'searchDate'));
    }
}