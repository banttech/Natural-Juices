<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddHomeAdsRequest;
use App\Models\HomePageAds;
use Illuminate\Support\Facades\Storage;


class HomeAdsController extends Controller
{
	public function create()
    {
        $active = 'offers';
        $homePageAds = HomePageAds::get();
        if(count($homePageAds) > 0){
            return redirect('editHomePageAds');      
        }
        return view('admin.offer_and_discount.home_ads.add',  compact('homePageAds','active'));
    }

    public function store(AddHomeAdsRequest $request)
    {        
        if($request->hasFile('home_page_ads')){
            foreach ($request->home_page_ads as $key => $home_page_ad) {
                $data = array();
                $home_ad_img = $home_page_ad;
                
                $home_ad_img_name = time().$key.'.'.$home_ad_img->getClientOriginalExtension();
                $home_ad_img->move(public_path('/images/home-ads'),$home_ad_img_name);
                $data[$key]['image_name'] = $home_ad_img_name;
                
                HomePageAds::insert($data);  
            }
        }

        return redirect('editHomePageAds')->with('flash_message_success','Record Added Successfully');
    }

    public function edit()
    {
        $active = 'offers';
        $homePageAds = HomePageAds::get();

        return view('admin.offer_and_discount.home_ads.edit', compact('active', 'homePageAds'));
    }

    public function update(Request $request)
    {
        $active = 'offers';

        HomePageAds::truncate();
        if(count($request->home_page_ads) > 0) {
            foreach ($request->home_page_ads as $key => $home_page_ad) {
                $data = array();
                $home_ad_img = $home_page_ad;
                if(is_file($home_ad_img)){
                    $home_ad_img_name = time().$key.'.'.$home_ad_img->getClientOriginalExtension();
                    $home_ad_img->move(public_path('/images/home-ads'),$home_ad_img_name);
                    $data[$key]['image_name'] = $home_ad_img_name;
                }else{
                    $data[$key]['image_name'] = $home_ad_img;
                }
                HomePageAds::insert($data);  
            }   
        }

        return redirect('editHomePageAds')->with('flash_message_success','Record Updated Successfully');
    }
}