<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\Offer;
use App\Models\OfferCategory;
use App\Models\OfferHasImage;
use Illuminate\Support\Facades\Storage;

class OfferController extends Controller
{
	public function index()
    {
        $active = 'offers';
        $offers = Offer::with('category', 'offerImages')->latest()->paginate(10);

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
        $offer->offer_category_id = $request->offer_category;
        $offer->target_url = $request->target_url;
        $offer->save();

        $offer_id = $offer->id;

        if($request->hasFile('offer_img_name')){
            foreach ($request->offer_img_name as $key => $offer_img) {
                $data = array();
                $offerImg = $offer_img;
                
                $offerImgNmae = time().$key.'.'.$offerImg->getClientOriginalExtension();
                $offerImg->move(public_path('/images/offers'),$offerImgNmae);
                $data[$key]['img_name'] = $offerImgNmae;
                $data[$key]['offer_id'] = $offer_id;
                $data[$key]['img_description'] = $request->description[$key];
                
                OfferHasImage::insert($data);
            }
        }

        return redirect('viewOffers')->with('flash_message_success','Record Added Successfully');
    }

    public function edit($id)
    {
        $active = 'offers';
        $offer = Offer::with('category', 'offerImages')->where('id', $id)->first();
        $offerCategories = OfferCategory::all();

        return view('admin.offer_and_discount.offers.edit', compact('offer','offerCategories','active'));
    }

    public function update(UpdateOfferRequest $request, $id)
    {
        $offer = Offer::find($id);
        $offer->status = $request->status == 'on' ? 'active' : 'inactive';
        $offer->offer_category_id = $request->offer_category;
        $offer->target_url = $request->target_url;
        $offer->update();

        OfferHasImage::where('offer_id',$id)->delete();
        foreach ($request->offer_img_name as $key => $offer_img) {
            $data = array();
            $offerImg = $offer_img;
            if(is_file($offer_img)){
                $offerImgNmae = time().$key.'.'.$offerImg->getClientOriginalExtension();
                $offerImg->move(public_path('/images/offers'),$offerImgNmae);
                $data[$key]['img_name'] = $offerImgNmae;
                $data[$key]['offer_id'] = $id;
                $data[$key]['img_description'] = $request->description[$key];

            }else{
                $data[$key]['img_name'] = $offerImg;
                $data[$key]['offer_id'] = $id;
                $data[$key]['img_description'] = $request->description[$key];
            }
            
            OfferHasImage::insert($data);
        }

        return redirect('viewOffers')->with('flash_message_success','Record Updated Successfully');
    }

    public function delete($id)
    {
        $offer = Offer::find($id);
        $offer->delete();
        return redirect('viewOffers')->with('flash_message_success','Record Deleted Successfully');
    }
}