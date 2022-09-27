<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddShippingCategoryRequest;
use App\Models\ShippingCategory;
use App\Models\Country;

use Illuminate\Support\Facades\Storage;
use DB;

class ShippingCategoryController extends Controller
{
	public function index()
    {
        $active = 'settings';
        $shippingCategories = ShippingCategory::with('countries')->paginate(10);
        return view('admin.settings.shipping.view', compact('shippingCategories', 'active'));
    }

    public function add()
    {
        $active = 'settings';
        $countries = Country::whereNotIn('id', DB::table('shippingcategory_has_countries')->pluck('country_id'))->get();
        
        return view('admin.settings.shipping.add',  compact('active', 'countries'));
    }

    public function store(AddShippingCategoryRequest $request)
    { 
        $shippingCategory = new ShippingCategory();
        $shippingCategory->name = $request->name;
        $shippingCategory->shipping_charges = $request->shipping_charges;
        $shippingCategory->delivery_time = $request->delivery_time;
        $shippingCategory->save();

        $shippingCategory_id = $shippingCategory->id;
    
        if(!is_null($request->countries)){
            foreach ($request->countries as $key => $country) {
                $dataArray['shipping_category_id'] = $shippingCategory_id;
                $dataArray['country_id'] = $country;
                DB::table('shippingcategory_has_countries')->insert($dataArray);
            }
        }

        return redirect('shippingCategories')->with('flash_message_success','Record Added Successfully');
    }

    public function edit($id)
    {
        $active = 'settings';
        $shippingCategory = ShippingCategory::with('countries')->where('id', $id)->first();
        $shippingcategory_has_countries  = DB::table('shippingcategory_has_countries')->where('shipping_category_id',$id)->get();
        $selected_shippingcategories_ids = array(); 
        foreach ($shippingcategory_has_countries as $key => $shipping_category_id) {
            $selected_shippingcategories_ids[] = $shipping_category_id->country_id;
        }

        $countries = Country::whereNotIn('id', DB::table('shippingcategory_has_countries')->whereNotIn('shipping_category_id', [$id])->pluck('country_id'))->get();

        return view('admin.settings.shipping.edit', compact('shippingCategory', 'countries', 'selected_shippingcategories_ids','active'));
    }

    public function update(AddShippingCategoryRequest $request, $id)
    {
        $shippingCategory = ShippingCategory::find($id);
        $shippingCategory->name = $request->name;
        $shippingCategory->shipping_charges = $request->shipping_charges;
        $shippingCategory->delivery_time = $request->delivery_time;
        $shippingCategory->update();
        $shippingCategory_id = $shippingCategory->id;
    

        DB::table('shippingcategory_has_countries')->where('shipping_category_id',$id)->delete();
        
        if(!is_null($request->countries)){
            foreach ($request->countries as $key => $country) {
                $dataArray['shipping_category_id'] = $shippingCategory_id;
                $dataArray['country_id'] = $country;
                DB::table('shippingcategory_has_countries')->insert($dataArray);
            }
        }

        return redirect('shippingCategories')->with('flash_message_success','Record Added Successfully');
    }

    public function delete($id)
    {
        $shippingCategory = ShippingCategory::find($id);
        $shippingCategory->delete();
        DB::table('shippingcategory_has_countries')->where('shipping_category_id', $id)->delete();

        return redirect('shippingCategories')->with('flash_message_success','Record Deleted Successfully');
    }
}