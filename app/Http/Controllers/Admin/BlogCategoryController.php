<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddBlogCategoryRequest;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Storage;

class BlogCategoryController extends Controller
{

    public function index()
    {
        $active = 'blogs';
        $blogCategories = BlogCategory::paginate(10);
        return view('admin.blog.categories.view', compact('active', 'blogCategories',));
    }

    public function create()
    {
        $active = 'blogs';
        $parnetCategories = BlogCategory::get();
        return view('admin.blog.categories.add',  compact('active', 'parnetCategories'));
    }

    public function store(AddBlogCategoryRequest $request)
    {        
        $blogCategory = new BlogCategory;
        $blogCategory->cat_name = $request->cat_name;
        $blogCategory->parent_cat_id = $request->parent_cat_id;
        $blogCategory->save();

        return redirect('viewBlogCategories')->with('flash_message_success','Record Added Successfully');
    }

    public function edit($id)
    {
        $active = 'blogs';
        $blogCategory = BlogCategory::find($id);
        $parnetCategories = BlogCategory::get();
        return view('admin.blog.categories.edit', compact('active', 'blogCategory', 'parnetCategories'));
    }

    public function update(AddBlogCategoryRequest $request, $id)
    {
        $blogCategory = BlogCategory::find($id);
        $blogCategory->cat_name = $request->cat_name;
        $blogCategory->parent_cat_id = $request->parent_cat_id;
        $blogCategory->update();


        return redirect('viewBlogCategories')->with('flash_message_success','Record Updated Successfully');
    }

    public function delete($id)
    {
        $blogCategory = BlogCategory::find($id);
        $blogCategory->delete();
        
        return redirect('viewBlogCategories')->with('flash_message_success','Record Deleted Successfully');
    }
}
