<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddFeatureRequest;
use App\Http\Requests\UpdateFeatureRequest;
use App\Models\Feature;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use DB;

class FeatureController extends Controller
{
	public function index()
    {
        $active = 'product';
        $features = Feature::with('categories')->latest()->paginate(10);
        return view('admin.features.view', compact('features', 'active'));
    }

    public function add()
    {
        $active = 'product';
        $categories = Category::latest()->get();
        return view('admin.features.add',  compact('categories','active'));
    }

    public function store(AddFeatureRequest $request)
    {  
        $feature = new Feature();
        $feature->name = $request->name;
        if($request->hasFile('icon')){
            $feature_icon = $request->file('icon');
            $feature_icon_name = time().'.'.$feature_icon->getClientOriginalExtension();
            $feature_icon->move(public_path('/images/features'),$feature_icon_name);
            $feature->icon = $feature_icon_name;
        }
        $feature->description = $request->description;
        $feature->short_description = $request->short_description;
        $feature->save();
        $feature_id = $feature->id;
    
        if(!is_null($request->categories)){
            foreach ($request->categories as $key => $category) {
                $dataArray['category_id'] = $category;
                $dataArray['feature_id'] = $feature_id;
                DB::table('feature_has_categories')->insert($dataArray);
            }
        }

        return redirect('viewFeatures')->with('flash_message_success','Record Added Successfully');
    }

    public function edit($id)
    {
        $active = 'product';
        $feature = Feature::with('categories')->where('id', $id)->first();
        $feature_has_categories  = DB::table('feature_has_categories')->where('feature_id',$id)->get();
        $selected_categories_ids = array(); 
        foreach ($feature_has_categories as $key => $feature_id) {
            $selected_categories_ids[] = $feature_id->category_id;
        }
        // dd($selected_categories_ids);
        $categories = Category::whereNull('parent_id')->where('status','active')->get();

        return view('admin.features.edit', compact('feature', 'categories','selected_categories_ids','active'));
    }

    public function update(UpdateFeatureRequest $request, $id)
    {
        $feature = Feature::find($id);
        $feature->name = $request->name;
        if($request->hasFile('icon')){
            $feature_icon = $request->file('icon');
            $feature_icon_name = time().'.'.$feature_icon->getClientOriginalExtension();
            $feature_icon->move(public_path('/images/features'),$feature_icon_name);
            $feature->icon = $feature_icon_name;
        }
        $feature->description = $request->description;
        $feature->short_description = $request->short_description;
        $feature->update();
        $feature_id = $feature->id;

        DB::table('feature_has_categories')->where('feature_id',$id)->delete();
        
        if(!is_null($request->categories)){
            foreach ($request->categories as $key => $category) {
                $dataArray['category_id'] = $category;
                $dataArray['feature_id'] = $feature_id;
                DB::table('feature_has_categories')->insert($dataArray);
            }
        }

        return redirect('viewFeatures')->with('flash_message_success','Record Updated Successfully');
    }

    public function delete($id)
    {
        $feature = Feature::find($id);
        $feature->delete();
        DB::table('feature_has_categories')->where('feature_id', $id)->delete();

        return redirect('viewFeatures')->with('flash_message_success','Record Deleted Successfully');
    }
}