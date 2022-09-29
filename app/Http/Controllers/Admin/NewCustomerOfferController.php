<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddNewCustomerOfferRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\NewCustomerOffer;
use Illuminate\Support\Facades\Storage;

class NewCustomerOfferController extends Controller
{
	public function index()
    {
        $active = 'offers';
        $newCustomerOffers = NewCustomerOffer::paginate(10);
        return view('admin.offer_and_discount.new_customer_offer.view', compact('active', 'newCustomerOffers'));
    }

    public function create()
    {
        $active = 'offers';
        return view('admin.offer_and_discount.new_customer_offer.add',  compact('active'));
    }

    public function store(AddNewCustomerOfferRequest $request)
    {     

        $newCustomerOffer = new NewCustomerOffer();
        $newCustomerOffer->name = $request->name;
        $newCustomerOffer->discount_type = $request->discount_type;
        $newCustomerOffer->discount = $request->discount;
        $newCustomerOffer->valid_from = $request->valid_from;
        $newCustomerOffer->end_date = $request->end_date;
        $newCustomerOffer->status = $request->status == 'on' ? 'active' : 'inactive';
        $newCustomerOffer->save();

        return redirect('viewNewCustomerOffers')->with('flash_message_success','Record Added Successfully');
    }

    public function edit($id)
    {
        $active = 'product';
        $newCustomerOffer = NewCustomerOffer::where('id', $id)->first();

        return view('admin.offer_and_discount.new_customer_offer.edit', compact('active', 'newCustomerOffer'));
    }

    public function update(AddNewCustomerOfferRequest $request, $id)
    {
        $newCustomerOffer = NewCustomerOffer::find($id);
        $newCustomerOffer->name = $request->name;
        $newCustomerOffer->discount_type = $request->discount_type;
        $newCustomerOffer->discount = $request->discount;
        $newCustomerOffer->valid_from = $request->valid_from;
        $newCustomerOffer->end_date = $request->end_date;
        $newCustomerOffer->status = $request->status == 'on' ? 'active' : 'inactive';
        $newCustomerOffer->update();

        return redirect('viewNewCustomerOffers')->with('flash_message_success','Record Updated Successfully');
    }

    public function delete($id)
    {
        $NewCustomerOffer = NewCustomerOffer::find($id);
        $NewCustomerOffer->delete();
        return redirect('viewNewCustomerOffers')->with('flash_message_success','Record Deleted Successfully');
    }
}