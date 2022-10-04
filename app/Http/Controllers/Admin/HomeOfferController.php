<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddHomeOfferRequest;
use App\Models\HomePageOffer;
use Illuminate\Support\Facades\Storage;


class HomeOfferController extends Controller
{
	public function create()
    {
        $active = 'offers';
        $homePageOffer = HomePageOffer::get();
        if(count($homePageOffer) > 0){
            return redirect('editHomePageOffer');      
        }
        return view('admin.offer_and_discount.home_offer.add',  compact('active'));
    }

    public function store(AddHomeOfferRequest $request)
    {        
        if($request->hasFile('home_page_offer')){
            $home_offer = new HomePageOffer();
            $home_offer_img = $request->home_page_offer;
            $home_offer_img_name = time().'.'.$home_offer_img->getClientOriginalExtension();
            $home_offer_img->move(public_path('/images/home-offer'),$home_offer_img_name);

            $home_offer->image_name = $home_offer_img_name;
            $home_offer->save();
        }

        return redirect('editHomePageOffer')->with('flash_message_success','Record Added Successfully');
    }

    public function edit()
    {
        $active = 'offers';
        $homePageOffer = HomePageOffer::first();

        return view('admin.offer_and_discount.home_offer.edit', compact('active', 'homePageOffer'));
    }

    public function update(Request $request)
    {
        $active = 'offers';

        if($request->hasFile('home_page_offer')){

            $homePageOffer = HomePageOffer::first();
            $homePageOffer->delete();

            $home_offer_img = $request->home_page_offer;
            $home_offer_img_name = time().'.'.$home_offer_img->getClientOriginalExtension();
            $home_offer_img->move(public_path('/images/home-offer'),$home_offer_img_name);


            $home_offer = new HomePageOffer();
            $home_offer->image_name = $home_offer_img_name;
            $home_offer->save();
        }

        return redirect('editHomePageOffer')->with('flash_message_success','Record Updated Successfully');
    }
}