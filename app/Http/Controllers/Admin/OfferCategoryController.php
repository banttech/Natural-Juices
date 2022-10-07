<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddOfferCategoryRequest;
use App\Models\OfferCategory;
use Illuminate\Support\Facades\Storage;
use DB;

class OfferCategoryController extends Controller
{
	public function index()
    {
        $active = 'offers';
        $offerCategories = OfferCategory::latest()->paginate(10);
        return view('admin.offer_and_discount.offer_category.view', compact('offerCategories', 'active'));
    }

    public function create()
    {
        $active = 'offers';
        return view('admin.offer_and_discount.offer_category.add',  compact('active'));
    }

    public function store(AddOfferCategoryRequest $request)
    {        

        $offerCategory = new OfferCategory();
        $offerCategory->name = $request->name;
        $offerCategory->save();

        return redirect('viewOfferCategories')->with('flash_message_success','Record Added Successfully');
    }

    public function edit($id)
    {
        $active = 'offers';
        $offerCategory = OfferCategory::where('id', $id)->first();

        return view('admin.offer_and_discount.offer_category.edit', compact('offerCategory','active'));
    }

    public function update(AddOfferCategoryRequest $request, $id)
    {
        $OfferCategory = OfferCategory::find($id);
        $OfferCategory->name = $request->name;
        $OfferCategory->update();

        return redirect('viewOfferCategories')->with('flash_message_success','Record Updated Successfully');
    }

    public function delete($id)
    {
        $offerCategory = OfferCategory::find($id);
        $offerCategory->delete();
        return redirect('viewOfferCategories')->with('flash_message_success','Record Deleted Successfully');
    }
}