<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddShoppingCartOfferRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\ShoppingCartOffer;
use Illuminate\Support\Facades\Storage;

class ShoppingCartOfferController extends Controller
{
	public function index()
    {
        $active = 'offers';
        $shoppingCartOffers = ShoppingCartOffer::paginate(10);
        return view('admin.offer_and_discount.shopping_cart_offer.view', compact('active', 'shoppingCartOffers'));
    }

    public function create()
    {
        $active = 'offers';
        return view('admin.offer_and_discount.shopping_cart_offer.add', compact('active'));
    }

    public function store(AddShoppingCartOfferRequest $request)
    {     

        $shoppingCartOffer = new ShoppingCartOffer();
        $shoppingCartOffer->name = $request->name;
        $shoppingCartOffer->minimum_cart_value = $request->minimum_cart_value;
        $shoppingCartOffer->discount_type = $request->discount_type;
        $shoppingCartOffer->discount = $request->discount;
        $shoppingCartOffer->valid_from = $request->valid_from;
        $shoppingCartOffer->end_date = $request->end_date;
        $shoppingCartOffer->status = $request->status == 'on' ? 'active' : 'inactive';
        $shoppingCartOffer->description = $request->description;
        $shoppingCartOffer->save();

        return redirect('viewShoppingCartOffers')->with('flash_message_success','Record Added Successfully');
    }

    public function edit($id)
    {
        $active = 'product';
        $shoppingCartOffer = ShoppingCartOffer::where('id', $id)->first();

        return view('admin.offer_and_discount.shopping_cart_offer.edit', compact('active', 'shoppingCartOffer'));
    }

    public function update(AddShoppingCartOfferRequest $request, $id)
    {
        $shoppingCartOffer = ShoppingCartOffer::find($id);
        $shoppingCartOffer->name = $request->name;
        $shoppingCartOffer->minimum_cart_value = $request->minimum_cart_value;
        $shoppingCartOffer->discount_type = $request->discount_type;
        $shoppingCartOffer->discount = $request->discount;
        $shoppingCartOffer->valid_from = $request->valid_from;
        $shoppingCartOffer->end_date = $request->end_date;
        $shoppingCartOffer->status = $request->status == 'on' ? 'active' : 'inactive';
        $shoppingCartOffer->description = $request->description;
        $shoppingCartOffer->update();

        return redirect('viewShoppingCartOffers')->with('flash_message_success','Record Updated Successfully');
    }

    public function delete($id)
    {
        $shoppingCartOffer = ShoppingCartOffer::find($id);
        $shoppingCartOffer->delete();
        return redirect('viewShoppingCartOffers')->with('flash_message_success','Record Deleted Successfully');
    }
}