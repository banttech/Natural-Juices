<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index()
    {
        $active = 'product';
        $categories = Category::latest()->paginate(10);
        $parentCategories = Category::whereNull('parent_id')->latest()->get();
        return view('admin.categories.view', compact('categories', 'parentCategories','active'));
    }

    public function add()
    {
        $active = 'product';

        $categories = Category::whereNull('parent_id')->latest()->get();
        return view('admin.categories.add',  compact('categories','active'));
    }

    public function store(AddCategoryRequest $request)
    {        
        $tags = '';
        if(!is_null($request->tags)){
            $tags = implode(',', $request->tags);
        }
        $category = new Category;
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;

        if(isset($request->status) && $request->status == 'on'){
            $category->status = 'active';
        }else{
            $category->status = 'inactive';
        }
        
        $category->sort_order = $request->sort_order;
        if($request->hasFile('home_banner_img')){
            $home_banner_img = $request->file('home_banner_img');
            $banner_img_name = time().'.'.$home_banner_img->getClientOriginalExtension();
            $home_banner_img->move(public_path('/images/categories'),$banner_img_name);
            $category->home_banner_img = $banner_img_name;
        }
        if($request->hasFile('cover_img')){
            $cover_img = $request->file('cover_img');
            $cover_img_name = time().'.'.$cover_img->getClientOriginalExtension();
            $cover_img->move(public_path('/images/categories'),$cover_img_name);
            $category->cover_img = $cover_img_name;
        }
        $category->description = $request->description;
        $category->title = $request->title;
        $category->url_slug = $request->url_slug;
        $category->tags = $tags;
        $category->meta_description = $request->meta_description;
        $category->save();

        return redirect('viewCategories')->with('flash_message_success','Record Added Successfully');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('viewCategories')->with('flash_message_success','Record Deleted Successfully');
    }

    public function edit($id)
    {
        $active = 'product';
        $category = Category::find($id);
        $categories = Category::whereNull('parent_id')->where('status','active')->get();
        return view('admin.categories.edit', compact('category', 'categories','active'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;

        if(isset($request->status) && $request->status == 'on'){
            $category->status = 'active';
        }else{
            $category->status = 'inactive';
        }

        $category->sort_order = $request->sort_order;

        if($request->hasFile('home_banner_img')){
            $home_banner_img = $request->file('home_banner_img');
            $banner_img_name = time().'.'.$home_banner_img->getClientOriginalExtension();
            $home_banner_img->move(public_path('/images/categories'),$banner_img_name);
            $category->home_banner_img = $banner_img_name;
        }
        if($request->hasFile('cover_img')){
            $cover_img = $request->file('cover_img');
            $cover_img_name = time().'.'.$cover_img->getClientOriginalExtension();
            $cover_img->move(public_path('/images/categories'),$cover_img_name);
            $category->cover_img = $cover_img_name;
        }
        $category->description = $request->description;
        $category->title = $request->title;
        $category->url_slug = $request->url_slug;
        $category->meta_description = $request->meta_description;

        $category->update();
        return redirect('viewCategories')->with('flash_message_success','Record Updated Successfully');
    }
}
