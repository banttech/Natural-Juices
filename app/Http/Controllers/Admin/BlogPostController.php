<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\Product;
use App\Models\BlogHasProduct;
use Illuminate\Support\Facades\Storage;


class BlogPostController extends Controller
{
	public function index()
    {
        $active = 'blogs';
        $blogPosts = BlogPost::paginate(10);
        return view('admin.blog.posts.view', compact('active', 'blogPosts'));
    }

    public function create()
    {
        $active = 'blogs';
        $blogCategories = BlogCategory::whereNull('parent_cat_id')->get();
        $products = Product::select('id', 'prod_name')->get();
        return view('admin.blog.posts.add',  compact('active', 'blogCategories', 'products'));
    }

    public function store(AddBlogPostRequest $request)
    {        
        $tags = '';
        if(!is_null($request->tags)){
            $tags = implode(',', $request->tags);
        }

        $blogPost = new BlogPost();
        $blogPost->status = $request->status == 'on' ? 'active' : 'inactive';
        $blogPost->title = $request->title;
        $blogPost->sub_title = $request->sub_title;
        $blogPost->description = $request->description;
        $blogPost->tags = $tags;
        $blogPost->category = $request->category;
        $blogPost->sub_category = $request->sub_category;
        $blogPost->category = $request->category;
        $blogPost->category = $request->category;
        if($request->hasFile('feature_image')){
            $feature_img = $request->file('feature_image');
            $feature_img_name = time().'.'.$feature_img->getClientOriginalExtension();
           
            $feature_img->move(public_path('/images/blogPosts'),$feature_img_name);
            $blogPost->feature_image = $feature_img_name;
        }
        $blogPost->seo_title = $request->seo_title;
        $blogPost->seo_description = $request->seo_description;
        $blogPost->save();


        $blogPost_id = $blogPost->id;
        if(!is_null($request->respective_products)){
            foreach ($request->respective_products as $key => $respective_product) {
                $dataArray['blog_id'] = $blogPost_id;
                $dataArray['product_id'] = $respective_product;
                BlogHasProduct::insert($dataArray);
            }
        }

	    return redirect('viewBlogPosts')->with('flash_message_success','Record Added Successfully');
    }

    public function edit($id)
    {
        $active = 'blogs';
        $blogPost = BlogPost::where('id', $id)->first();
        $blogCategories = BlogCategory::whereNull('parent_cat_id')->get();
        $products = Product::select('id', 'prod_name')->get();
        $selectedBlogProducts = BlogHasProduct::where('blog_id', $id)->pluck('product_id')->toArray();

        return view('admin.blog.posts.edit', compact('active', 'blogPost', 'blogCategories','products', 'selectedBlogProducts'));
    }

    public function update(UpdateBlogPostRequest $request, $id)
    {
        $tags = '';
        if(!is_null($request->tags)){
            $tags = implode(',', $request->tags);
        }

        $blogPost = BlogPost::find($id);
        $blogPost->status = $request->status == 'on' ? 'active' : 'inactive';
        $blogPost->title = $request->title;
        $blogPost->sub_title = $request->sub_title;
        $blogPost->description = $request->description;
        $blogPost->tags = $tags;
        $blogPost->category = $request->category;
        $blogPost->sub_category = $request->sub_category;
        $blogPost->category = $request->category;
        $blogPost->category = $request->category;
        if($request->hasFile('feature_image')){
            $feature_img = $request->file('feature_image');
            $feature_img_name = time().'.'.$feature_img->getClientOriginalExtension();
           
            $feature_img->move(public_path('/images/blogPosts'),$feature_img_name);
            $blogPost->feature_image = $feature_img_name;
        }
        $blogPost->seo_title = $request->seo_title;
        $blogPost->seo_description = $request->seo_description;
        $blogPost->update();

        $blogPost_id = $blogPost->id;
        BlogHasProduct::where('blog_id',$id)->delete();
        if(!is_null($request->respective_products)){
            foreach ($request->respective_products as $key => $respective_product) {
                $dataArray['blog_id'] = $blogPost_id;
                $dataArray['product_id'] = $respective_product;
                BlogHasProduct::insert($dataArray);
            }
        }

        return redirect('viewBlogPosts')->with('flash_message_success','Record Updated Successfully');
    }

    public function delete($id)
    {
        $blogPost = BlogPost::find($id);
        $blogPost->delete();
        return redirect('viewBlogPosts')->with('flash_message_success','Record Deleted Successfully');
    }


    public function subCategories(Request $request)
    {
        if(empty($request->val)){
             return '<option value="">No Sub Category Found!</option>';
        }
        $sub_categories = BlogCategory::where('parent_cat_id',$request->val)->get();
        
        $html = "";
        if(isset($sub_categories) && count($sub_categories) > 0){
            $html .= '<option value="">Sub-Category</option>';

            foreach($sub_categories as $sub_category){
                
                $html .= '<option value="'.$sub_category['id'].'">'.$sub_category['cat_name'].'</option>';
            }
        }else{
            $html .= '<option value="">No Sub Category Found!</option>';
        }
        return $html;
    }  
}