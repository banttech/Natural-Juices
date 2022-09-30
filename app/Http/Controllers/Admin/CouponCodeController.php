<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddCouponCodeRequest;
use App\Models\CouponCode;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class CouponCodeController extends Controller
{
	public function index()
    {
        $active = 'offers';
        $couponCodes = CouponCode::paginate(10);
        return view('admin.offer_and_discount.coupon_code.view', compact('active', 'couponCodes'));
    }

    public function create()
    {
        $active = 'offers';
        $categories = Category::get();
        $brands = Brand::get();
        return view('admin.offer_and_discount.coupon_code.add', compact('active', 'categories', 'brands'));
    }

    public function store(AddCouponCodeRequest $request)
    {     

        $couponCode = new CouponCode();
        $couponCode->coupon_code = $request->coupon_code;
        $couponCode->coupon_type = $request->coupon_type;
        $couponCode->discount = $request->discount;
        $couponCode->coupon_status = $request->coupon_status == 'on' ? 'active' : 'inactive';
        $couponCode->valid_from = $request->valid_from;
        $couponCode->end_date = $request->end_date;
        $couponCode->usage_allowed = $request->usage_allowed;
        $couponCode->limit_per_customer = $request->limit_per_customer;
        $couponCode->minimum_apply_value = $request->minimum_apply_value;
        $couponCode->apply_on_specific_category = $request->apply_on_specific_category;
        $couponCode->apply_on_specific_brand = $request->apply_on_specific_brand;
        $couponCode->show_on_cart_page =  $request->show_on_cart_page == 'on' ? 'yes' : 'no';
        $couponCode->description = $request->description;
        $couponCode->save();

        return redirect('viewCouponCodes')->with('flash_message_success','Record Added Successfully');
    }

    public function edit($id)
    {
        $active = 'offers';
        $categories = Category::get();
        $brands = Brand::get();
        $couponCode = CouponCode::where('id', $id)->first();

        return view('admin.offer_and_discount.coupon_code.edit', compact('active', 'couponCode', 'categories', 'brands'));
    }

    public function update(AddCouponCodeRequest $request, $id)
    {
        $couponCode = CouponCode::find($id);
        $couponCode->coupon_code = $request->coupon_code;
        $couponCode->coupon_type = $request->coupon_type;
        $couponCode->discount = $request->discount;
        $couponCode->coupon_status = $request->coupon_status == 'on' ? 'active' : 'inactive';
        $couponCode->valid_from = $request->valid_from;
        $couponCode->end_date = $request->end_date;
        $couponCode->usage_allowed = $request->usage_allowed;
        $couponCode->limit_per_customer = $request->limit_per_customer;
        $couponCode->minimum_apply_value = $request->minimum_apply_value;
        $couponCode->apply_on_specific_category = $request->apply_on_specific_category;
        $couponCode->apply_on_specific_brand = $request->apply_on_specific_brand;
        $couponCode->show_on_cart_page =  $request->show_on_cart_page == 'on' ? 'yes' : 'no';
        $couponCode->description = $request->description;
        $couponCode->update();

        return redirect('viewCouponCodes')->with('flash_message_success','Record Updated Successfully');
    }

    public function delete($id)
    {
        $couponCode = CouponCode::find($id);
        $couponCode->delete();
        return redirect('viewCouponCodes')->with('flash_message_success','Record Deleted Successfully');
    }
}