<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use DB;

class BrandController extends Controller
{
	public function index()
    {
        $active = 'product';
        $brands = Brand::with('categories')->latest()->paginate(10);
        return view('admin.brands.view', compact('brands', 'active'));
    }

    public function add()
    {
        $active = 'product';
        $categories = Category::latest()->get();
        return view('admin.brands.add',  compact('categories','active'));
    }

    public function store(AddBrandRequest $request)
    {        
        $tags = '';
        if(!is_null($request->tags)){
            $tags = implode(',', $request->tags);
        }

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->status = $request->status == 'on' ? 'active' : 'inactive';
        $brand->description = $request->description;
        $brand->title = $request->title;
        $brand->url_slug = $request->url_slug;
        $brand->tags = $tags;
        $brand->meta_description = $request->meta_description;
        if($request->hasFile('home_logo')){
            $home_logo = $request->file('home_logo');
            $logo_img_name = time().'.'.$home_logo->getClientOriginalExtension();
           
            $home_logo->move(public_path('/images/brands'),$logo_img_name);
            $brand->home_logo = $logo_img_name;
        }
        if($request->hasFile('cover_img')){
            $cover_img = $request->file('cover_img');
            $cover_img_name = time().'.'.$cover_img->getClientOriginalExtension();
            $cover_img->move(public_path('/images/brands'),$cover_img_name);
	        $brand->cover_img = $cover_img_name;
        }
        $brand->save();
        $brand_id = $brand->id;

        if(!is_null($request->categories)){
            foreach ($request->categories as $key => $category) {

                $dataArray['category_id'] = $category;
                $dataArray['brand_id'] = $brand_id;
                DB::table('brand_has_categories')->insert($dataArray);
            }
        }

	    return redirect('viewBrands')->with('flash_message_success','Record Added Successfully');
    }

    public function edit($id)
    {
        $active = 'product';
        $brand = Brand::with('categories')->where('id', $id)->first();
        $brand_has_categories  = DB::table('brand_has_categories')->where('brand_id',$id)->get();
        $selected_categories_ids = array(); 
        foreach ($brand_has_categories as $key => $brand_id) {
            $selected_categories_ids[] = $brand_id->category_id;
        }
        // dd($selected_categories_ids);
        $categories = Category::whereNull('parent_id')->where('status','active')->get();

        return view('admin.brands.edit', compact('brand', 'categories','selected_categories_ids','active'));
    }

    public function update(UpdateBrandRequest $request, $id)
    {
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->status = $request->status == 'on' ? 'active' : 'inactive';

        if($request->hasFile('home_logo')){
            $home_logo = $request->file('home_logo');
            $logo_img_name = time().'.'.$home_logo->getClientOriginalExtension();
            $home_logo->move(public_path('/images/brands'),$logo_img_name);
            $brand->home_logo = $logo_img_name;
        }
        if($request->hasFile('cover_img')){
            $cover_img = $request->file('cover_img');
            $cover_img_name = time().'.'.$cover_img->getClientOriginalExtension();
            $cover_img->move(public_path('/images/brands'),$cover_img_name);
            $brand->cover_img = $cover_img_name;
        }
        $brand->description = $request->description;
        $brand->title = $request->title;
        $brand->url_slug = $request->url_slug;
        $brand->meta_description = $request->meta_description;

        $brand->update();

        DB::table('brand_has_categories')->where('brand_id',$id)->delete();
        if(!is_null($request->categories)){
            foreach ($request->categories as $key => $category) {
           		$dataArray['category_id'] = $category;
           		$dataArray['brand_id'] = $id;
           		DB::table('brand_has_categories')->insert($dataArray);
           	}
        }
        return redirect('viewBrands')->with('flash_message_success','Record Updated Successfully');
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('viewBrands')->with('flash_message_success','Record Deleted Successfully');
    }
}