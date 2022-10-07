<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Feature;
use App\Models\Brand;
use App\Models\ProductHasImage;
use DB;


class ProductController extends Controller
{
    public function index()
    {
        $active = 'product';
        $products = Product::with(['feature_img' => function($q) {
            $q->where('is_featured','1');
        }])->latest()->paginate(10);

        return view('admin.products.view', compact('products', 'active'));
    }

    public function create()
    {
        $active = 'product';
        $categories = Category::select('id','name')->get();
        $brands = Brand::select('id', 'name')->get();
        $features = Feature::select('id', 'name')->get();

        return view('admin.products.add', compact('active', 'categories', 'features', 'brands'));
    }

    public function store(AddProductRequest $request)
    {

        // dd("here");
        $product = new Product;
        $product->prod_name = $request->prod_name;
        $product->prod_status = $request->prod_status == 'on' ? 'active' : 'inactive';

        $product->prod_category = $request->prod_category;
        $product->prod_brand = $request->prod_brand;
        $product->reg_sel_price = $request->reg_sel_price;
        $product->prod_discount = $request->prod_discount;
        $product->prod_discount_type = $request->prod_discount_type;
        $product->final_sel_price = $request->final_sel_price;
        $product->prod_weight = $request->prod_weight;  
        $product->prod_manual_discount = $request->prod_manual_discount;
        $product->prod_stock_unit = $request->prod_stock_unit;
        $product->prod_subsciption_discount = $request->prod_subsciption_discount;
        $product->prod_subscription_discount_type = $request->prod_subscription_discount_type;
        $product->prod_subscription_final_sel_price = $request->prod_subscription_final_sel_price;
        $product->prod_faq = $request->prod_faq;
        $product->prod_description = $request->prod_description;
        $product->prod_supplements_facts = $request->prod_supplements_facts;
        $product->prod_directions = $request->prod_directions;
        $product->prod_suitable_for = $request->prod_suitable_for;

        // $product->pack_name = $request->pack_name;
        // $product->pack_manual_discount = $request->pack_manual_discount;
        // $product->pack_quantity = $request->pack_quantity;
        // $product->pack_selling_price = $request->pack_selling_price;
        // $product->pack_discount = $request->pack_discount;
        // $product->pack_discount_type = $request->pack_discount_type;
        // $product->pack_final_sel_price = $request->pack_final_sel_price;
        // $product->pack_subscription_discount = $request->pack_subscription_discount;
        // $product->pack_subscription_discount_type = $request->pack_subscription_discount_type;
        // $product->pack_subscription_fin_sel_price = $request->pack_subscription_fin_sel_price;

        // if($request->hasFile('pack_images')){
        //     $pack_images = $request->file('pack_images');
        //     $pack_images_name = time().'.'.$pack_images->getClientOriginalExtension();
        //     $pack_images->move(public_path('/images/products'),$pack_images_name);
        //     $product->pack_images = $pack_images_name;
        // }

        $product->product_features_status = $request->product_features_status;

        $product->seo_title = $request->seo_title;
        $product->url_slug = $request->url_slug;
        $product->seo_tags = $request->seo_tags ? implode(',', $request->seo_tags) : '';
        $product->meta_description = $request->meta_description;
        $product->save();
        $product_id = $product->id;
        // dd($request->packs);
        if(isset($request->packs) && count($request->packs) > 0 ){
            $packs = $request->packs;
            foreach ($packs as $key => $pack) {
                $data = array();
                // dd($pack);
                $insertData = $pack;
                if(isset($insertData['pack_img_checkbox'])){
                    unset($insertData['pack_img_checkbox']);
                }
                unset($insertData['pack_images']);

                $insertData['product_id'] = $product_id;
                $products_packs_id = DB::table('products_packs')->insertGetId($insertData);

                if(isset($pack['pack_images']) && count($pack['pack_images']) > 0){

                  foreach ($pack['pack_images'] as $key => $pack_images) {

                
                    if(is_file($pack_images)){
                        $data = array();
                        $pack_images = $pack_images;
                        $pack_images_name = time().$key.'.'.$pack_images->getClientOriginalExtension();
                        $pack_images->move(public_path('/images/products'),$pack_images_name);
                        $data['pack_id'] = $products_packs_id;
                        $data['image_name'] = $pack_images_name;
                        if(isset($insertData['pack_img_checkbox'])){
                            if($key == $pack['pack_img_checkbox']){
                                $data['is_featured'] = 1;
                            }else{
                                $data['is_featured'] = 0;
                            }
                        }else{
                            $data['is_featured'] = 0;
                        }
                    }
                    DB::table('products_pack_images')->insert($data);
                  }  
                }
            }
        }
        $data = array();

        // Save Product Features
        if(!is_null($request->features)){
            foreach ($request->features as $key => $feature) {
                $dataArray['feature_id'] = $feature;
                $dataArray['product_id'] = $product_id;
                DB::table('product_has_features')->insert($dataArray);
            }
        }

        // Save Product Images
        if($request->hasFile('prod_images')){
            foreach ($request->prod_images as $key => $prod_img) {
                $prod_images = $prod_img;
                $prod_images_name = time().$key.'.'.$prod_images->getClientOriginalExtension();
                $prod_images->move(public_path('/images/products'),$prod_images_name);

                $data['product_id'] = $product_id;
                $data['image_name'] = $prod_images_name;
                if($key == $request->prod_img_checkbox){
                    $data['is_featured'] = 1;
                }else{
                    $data['is_featured'] = 0;
                }
                ProductHasImage::insert($data);
            }
        }

        //Save Faq
        if(isset($request->faq) && count($request->faq) > 0){

            $faq_array = array();
            foreach ($request->faq as $key => $value) {
                $faq_array[$key]['product_id'] = $product_id;
                $faq_array[$key]['question'] = $value['questions'];
                $faq_array[$key]['answer'] = $value['answers'];
            }
            DB::table('product_has_faq')->insert($faq_array);
        }

        return redirect('viewProducts')->with('flash_message_success','Record Added Successfully');

    }

    public function edit($id)
    {

        $active = 'product';
        $product = Product::find($id);
        $categories = Category::select('id','name')->get();
        $selected_features_ids = DB::table('product_has_features')->where('product_id', $id)->pluck('feature_id')->toArray();
        $brands = Brand::select('id', 'name')->get();
        $features = Feature::all();
        $product_images = ProductHasImage::where('product_id',$id)->get();
        $product_has_faq = DB::table('product_has_faq')->where('product_id',$id)->get();
        $product_packs = DB::table('products_packs')->where('product_id',$id)->get();

        return view('admin.products.edit', compact('active', 
            'brands', 
            'product',
            'categories', 
            'features', 
            'selected_features_ids',
            'product_images',
            'product_has_faq',
            'product_packs',
        ));
    }

    public function update(EditProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->prod_name = $request->prod_name;
        $product->prod_status = $request->prod_status == 'on' ? 'active' : 'inactive';

        $product->prod_category = $request->prod_category;
        $product->prod_brand = $request->prod_brand;
        $product->reg_sel_price = $request->reg_sel_price;
        $product->prod_discount = $request->prod_discount;
        $product->prod_discount_type = $request->prod_discount_type;
        $product->final_sel_price = $request->final_sel_price;
        $product->prod_weight = $request->prod_weight;
        $product->prod_manual_discount = $request->prod_manual_discount;
        $product->prod_stock_unit = $request->prod_stock_unit;
        $product->prod_subsciption_discount = $request->prod_subsciption_discount;
        $product->prod_subscription_discount_type = $request->prod_subscription_discount_type;
        $product->prod_subscription_final_sel_price = $request->prod_subscription_final_sel_price;
        $product->prod_faq = $request->prod_faq;
        $product->prod_description = $request->prod_description;
        $product->prod_supplements_facts = $request->prod_supplements_facts;
        $product->prod_directions = $request->prod_directions;
        $product->prod_suitable_for = $request->prod_suitable_for;

        // $product->pack_name = $request->pack_name;
        // $product->pack_manual_discount = $request->pack_manual_discount;
        // $product->pack_quantity = $request->pack_quantity;
        // $product->pack_selling_price = $request->pack_selling_price;
        // $product->pack_discount = $request->pack_discount;
        // $product->pack_discount_type = $request->pack_discount_type;
        // $product->pack_final_sel_price = $request->pack_final_sel_price;
        // $product->pack_subscription_discount = $request->pack_subscription_discount;
        // $product->pack_subscription_discount_type = $request->pack_subscription_discount_type;
        // $product->pack_subscription_fin_sel_price = $request->pack_subscription_fin_sel_price;

        // dd($request->packs);

        if(isset($request->packs) && count($request->packs) > 0 ){

            $old_products_packs = DB::table('products_packs')->where('product_id',$id)->get();
            foreach ($old_products_packs as $opk => $op) {
                DB::table('products_packs')->where('id',$op->id)->delete();
                DB::table('products_pack_images')->where('pack_id',$op->id)->delete();
            }
            
            $packs = $request->packs;
            foreach ($packs as $key => $pack) {
                $data = array();
                // dd($pack);
                $insertData = $pack;
                if(isset($insertData['pack_img_checkbox'])){
                    unset($insertData['pack_img_checkbox']);
                }
                unset($insertData['pack_images']);

                $insertData['product_id'] = $id;
                $products_packs_id = DB::table('products_packs')->insertGetId($insertData);

                if(isset($pack['pack_images']) && count($pack['pack_images']) > 0){

                  foreach ($pack['pack_images'] as $key => $pack_images) {

                    if(is_file($pack_images)){
                        $data = array();
                        $pack_images = $pack_images;
                        $pack_images_name = time().$key.'.'.$pack_images->getClientOriginalExtension();
                        $pack_images->move(public_path('/images/products'),$pack_images_name);
                        $data['pack_id'] = $products_packs_id;
                        $data['image_name'] = $pack_images_name;
                        if(isset($insertData['pack_img_checkbox'])){
                            if($key == $pack['pack_img_checkbox']){
                                $data['is_featured'] = 1;
                            }else{
                                $data['is_featured'] = 0;
                            }
                        }else{
                            $data['is_featured'] = 0;
                        }
                    }else{

                        $data['pack_id'] = $products_packs_id;
                        $data['image_name'] = $pack_images;
                        if(isset($insertData['pack_img_checkbox'])){
                            if($key == $pack['pack_img_checkbox']){
                                $data['is_featured'] = 1;
                            }else{
                                $data['is_featured'] = 0;
                            }
                        }else{
                            $data['is_featured'] = 0;
                        }
                    }
                    DB::table('products_pack_images')->insert($data);
                  }  
                }
            }
        }
        // Update Product Images and Feature Image
        ProductHasImage::where('product_id',$id)->delete();
        foreach ($request->prod_images as $key => $prod_img) {
            $data = array();
            $prod_images = $prod_img;
            if(is_file($prod_images)){

                $prod_images_name = time().rand(1,100).$key.'.'.$prod_images->getClientOriginalExtension();
                $prod_images->move(public_path('/images/products'),$prod_images_name);
                $data[$key]['product_id'] = $id;
                $data[$key]['image_name'] = $prod_images_name;

            }else{
                $data[$key]['product_id'] = $id;
                $data[$key]['image_name'] = $prod_img;
            }

            if($key == $request->prod_img_checkbox){
                $data[$key]['is_featured'] = 1;
            }else{
                $data[$key]['is_featured'] = 0;
            }
            ProductHasImage::insert($data);        
        }


        if($request->hasFile('pack_images')){
            $pack_images = $request->file('pack_images');
            $pack_images_name = time().'.'.$pack_images->getClientOriginalExtension();
            $pack_images->move(public_path('/images/products'),$pack_images_name);
            $product->pack_images = $pack_images_name;
        }

        $product->product_features_status = $request->product_features_status;
        $product->seo_title = $request->seo_title;
        $product->url_slug = $request->url_slug;
        $product->seo_tags = implode(',', $request->seo_tags);
        $product->meta_description = $request->meta_description;

        $product->update();
        $product_id = $product->id;


        DB::table('product_has_features')->where('product_id',$id)->delete();

        // Save Product Features
        if(!is_null($request->features)){
            foreach ($request->features as $key => $feature) {
                $dataArray['feature_id'] = $feature;
                $dataArray['product_id'] = $product_id;
                DB::table('product_has_features')->insert($dataArray);
            }
        }

        //Save Faq
        if(isset($request->faq) && count($request->faq) > 0){

            DB::table('product_has_faq')->where('product_id',$product_id)->delete();

            $faq_array = array();
            foreach ($request->faq as $key => $value) {
                $faq_array[$key]['product_id'] = $product_id;
                $faq_array[$key]['question'] = $value['questions'];
                $faq_array[$key]['answer'] = $value['answers'];
            }
            DB::table('product_has_faq')->insert($faq_array);
        }

        return redirect('viewProducts')->with('flash_message_success','Record Updated Successfully');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        DB::table('product_has_features')->where('product_id',$id)->delete();
        ProductHasImage::where('product_id', $id)->delete();
        return redirect('viewProducts')->with('flash_message_success','Record Deleted Successfully');

    }

    public function search(Request $request)
    {
        $active = 'product';
        $prod_name = $request->prod_name ?? "";
        $products = Product::with(['feature_img' => function($q) {
            $q->where('is_featured','1');
        }]);
        $brands = Brand::select('id', 'name')->get();
        $categories = Category::whereNull('parent_id')->get();
        
        if ($prod_name !== '') {
            $products->where('prod_name', 'Like', '%' . $request->prod_name . '%');
        }

        if (!is_null($request->brand)) {
            $products->where('prod_brand', 'Like', '%' . $request->brand . '%');
        }

        if (!is_null($request->status)) {
            $products->where('prod_status', 'Like', '%' . $request->status . '%');
        }

        if(!is_null($request->category) || !is_null($request->sub_category)){
            $products->where('prod_category', 'Like', '%' . $request->category . '%');
        }

        $products = $products->latest()->paginate(10);

        return view('admin.products.search', compact('products', 'brands', 'prod_name', 'categories', 'active'));
    }

    public function subCategories(Request $request)
    {
        if(empty($request->val)){
             return '<option value="">No Sub Category Found!</option>';
        }
        $sub_categories = Category::where('parent_id',$request->val)->get();
        
        $html = "";
        if(isset($sub_categories) && count($sub_categories) > 0){
            $html .= '<option value="">Sub-Category</option>';

            foreach($sub_categories as $sub_category){
                
                $html .= '<option value="'.$sub_category['id'].'">'.$sub_category['name'].'</option>';
            }
        }else{
            $html .= '<option value="">No Sub Category Found!</option>';
        }
        return $html;
    }  

}
