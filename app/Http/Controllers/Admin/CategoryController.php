<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use DB;

class CategoryController extends Controller
{

    public function index()
    {
        $active = 'product';
        $categories = Category::whereNull('parent_id')->latest()->paginate(10);
        $parentCategories = Category::whereNull('parent_id')->latest()->get();
        return view('admin.categories.view', compact('categories', 'parentCategories','active'));
    }
    public function view()
    {
        $active = 'product';
        $categories = Category::whereNull('parent_id')->latest()->paginate(10);
        $parentCategories = Category::whereNull('parent_id')->latest()->get();
        return view('admin.categories.view_s', compact('categories', 'parentCategories','active'));
    }
    // Route::post('/updateCategorySort/{id}', [CategoryController::class, 'updateCategorySort'])->name('updateCategorySort');
    public function updateCategorySort($id = ""){
        $data = explode(',', $id);
        $value = $data[0];
        $id = $data[1];
        $already_exist = Category::whereNull('parent_id')->where('sort_order',$value)->count();
        if($already_exist > 0){
            echo 'fail';
        }else{
            Category::where('id',$id)->update(array('sort_order' => $value ));
            echo 'success';
        }
    }
    public function add()
    {
        $active = 'product';

        $categories = Category::whereNull('parent_id')->get();

        return view('admin.categories.add',  compact('categories','active'));
    }
    public function getCategories(){

        $categories = Category::all();
        $options = "<option value = ''>Select Category</option>";

        foreach ($categories as $key => $value) {

            $options .= "<option value = '".$value->id."'>".$value->name."</option>";

            $level_one_categories = Category::where('parent_id',$value->id)->get();

            if(isset($level_one_categories) && count($level_one_categories) > 0){

                foreach ($level_one_categories as $key => $level_one_cat) {

                    $options .= "<option value = '".$level_one_cat->id."'>-".$level_one_cat->name."</option>";
               
                    $level_two_categories = Category::where('parent_id',$level_one_cat->id)->get();

                    if(isset($level_two_categories) && count($level_two_categories) > 0){

                        foreach ($level_two_categories as $key => $level_two_cat) {
                            $options .= "<option value = '".$level_two_cat->id."'>--".$level_two_cat->name."</option>";
                        }
                    }
                }
            }
        }

        return $options;
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
        if(!is_null($request->parent_id)){
            $selectedCategory = Category::where('id', $category->parent_id)->first();
            $category->category_level = $selectedCategory->category_level + 1;
        }else{
            $category->category_level = 1;
        }


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
        $categories = Category::all();
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
