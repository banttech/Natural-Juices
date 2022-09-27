<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\Offer;
use App\Models\OfferCategory;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
	public function index()
    {
        $active = 'offers';
        $offers = Offer::paginate(10);
        return view('admin.offer_and_discount.offers.view', compact('offers', 'active'));
    }

    public function create()
    {
        $active = 'offers';
        $offerCategories = OfferCategory::all();
        return view('admin.offer_and_discount.offers.add',  compact('offerCategories','active'));
    }

    public function store(AddOfferRequest $request)
    {        
        $offer = new Offer();
        $offer->status = $request->status == 'on' ? 'active' : 'inactive';
        if($request->hasFile('offer_img')){
            $offer_img = $request->file('offer_img');
            $offer_img_name = time().'.'.$offer_img->getClientOriginalExtension();
           
            $offer_img->move(public_path('/images/offers'),$offer_img_name);
            $offer->offer_img = $offer_img_name;
        }
        $offer->offer_category = $request->offer_category;
        $offer->target_url = $request->target_url;
        $offer->save();

        return redirect('offers')->with('flash_message_success','Record Added Successfully');
    }

    public function edit($id)
    {
        $active = 'offers';
        $offer = Offer::where('id', $id)->first();
        $offerCategories = OfferCategory::all();

        return view('admin.offer_and_discount.offers.edit', compact('offer','offerCategories','active'));
    }

    public function update(UpdateOfferRequest $request, $id)
    {
        $offer = Offer::find($id);
        $offer->status = $request->status == 'on' ? 'active' : 'inactive';
        if($request->hasFile('offer_img')){
            $offer_img = $request->file('offer_img');
            $offer_img_name = time().'.'.$offer_img->getClientOriginalExtension();
           
            $offer_img->move(public_path('/images/offers'),$offer_img_name);
            $offer->offer_img = $offer_img_name;
        }
        $offer->offer_category = $request->offer_category;
        $offer->target_url = $request->target_url;
        $offer->update();

        return redirect('offers')->with('flash_message_success','Record Updated Successfully');
    }

    public function delete($id)
    {
        $offer = Offer::find($id);
        $offer->delete();
        return redirect('offers')->with('flash_message_success','Record Deleted Successfully');
    }
}