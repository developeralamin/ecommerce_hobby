<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Product_gallery;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use File; // For File

class ProductController extends Controller
{


	public function ProductView(){
       
		$this->data['ccount'] = Product::count();
		$this->data['products'] = Product::Simplepaginate(5);

		return view('backend.products.products_view',$this->data);

	}
//End method

	public function ProductAdd(){
      $this->data['categories'] = Category::all();
      $this->data['subcategories'] = SubCategory::all();

      return view('backend.products.products_add',$this->data);

	}
//End method

	public function ProductStore(Request $request){
       $request->validate([
        'product_name'         => 'required',                   
        'category_id'          => 'required',                   
        'subcategory_id'       => 'required',                   
        'product_price'        =>'required',
        'product_quantity'     =>'required',
        'product_summary'      =>'required',
        'product_description'  =>'required',
        'product_description'   =>'required',
        'product_thumbnail'     =>'required',  

       ]);


     $slug = strtolower(str_replace(' ', '-', $request->product_name));
     $check_slug = Product::where('slug',$slug)->count();

     if($check_slug > 0){
     	 $slug = $slug.''.time();
     }

      if($request->hasFile('product_thumbnail')){
         $currentDate = Carbon::now()->toDateString();

      	$image = $request->file('product_thumbnail');
      	 $ext = $slug.$currentDate.'.'.$image->getClientOriginalExtension();
       Image::make($image)->resize(270, 340)->save(public_path('/uploads/thumbnail/'.$ext)); 
     
$product_id =Product::insertGetId([
         'category_id'          =>$request->category_id,
         'subcategory_id'       =>$request->subcategory_id,
         'product_name'         =>$request->product_name,
         'slug'                 =>$slug,
         'product_summary'      =>$request->product_summary,
         'product_description'  =>$request->product_description,
         'product_price'        =>$request->product_price,
         'product_quantity'     =>$request->product_quantity,
         'product_thumbnail'    =>$ext,
         'created_at'           => Carbon::now(),
	     ]);

       if($request->hasFile('product_gallery')){

	$image2 = $request->file('product_gallery');
	 foreach ($image2 as $key => $item) {
	 	 $ext2 = time().$key.'.'.$item->getClientOriginalExtension();
       Image::make($item)->resize(270, 340)->save(public_path('/uploads/gallery/'.$ext2)); 


    Product_gallery::insert([
        'product_id' => $product_id,
        'product_gallery' => $ext2,
        'created_at' => Carbon::now(),
    ]);



	 }
      	

       }//End if conditon 

     }//End 1st if conditon

     else{

$product_id=Product::insert([
         'category_id'          =>$request->category_id,
         'subcategory_id'       =>$request->subcategory_id,
         'product_name'         =>$request->product_name,
         'slug'                 =>$slug,
         'product_summary'      =>$request->product_summary,
         'product_description'  =>$request->product_description,
         'product_price'        =>$request->product_price,
         'product_quantity'     =>$request->product_quantity,
         // 'product_thumbnail'    =>$request->product_thumbnail,
         'created_at'          => Carbon::now(),
	     ]);
	
	 if($request->hasFile('product_gallery')){

	$image3 = $request->file('product_gallery');
	 foreach ($image3 as $key => $item3) {
	 	 $ext23 = time().$key.'.'.$item3->getClientOriginalExtension();
       Image::make($item3)->resize(270, 340)->save(public_path('/uploads/gallery/'.$ext23)); 

      Product_gallery::insert([
        'product_id' => $product_id,
        'product_gallery' => $ext23,
        'created_at' => Carbon::now(),
     ]);


	 }
      	

       }//End if conditon 
     }//End else condition

      Session::flash('message','Data Inserted Successfully');
	    return back();

	
	}
//End method

	public function ProductEdit($id){


      $this->data['categories']     = Category::all();
      $this->data['subcategories']  = SubCategory::all();
      $this->data['editproducts']       = Product::findOrFail($id);

    return view('backend.products.products_edit',$this->data);

	}
//End method

	public function ProductUpdate(Request $request , $id){

        $old_product = Product::findOrFail($id);
        
        $slug = $old_product->slug;
        $old_image = $old_product->product_thumbnail;

     if($request->hasFile('product_thumbnail')){
          $image = $request->file('product_thumbnail');
         $ext = $slug.'.'.$image->getClientOriginalExtension();

     if(file_exists(public_path('uploads/thumbnail'.$old_image ))){

            @unlink(public_path('uploads/thumbnail'.$old_image ));
         }
       Image::make($image)->resize(270, 340)->save(public_path('/uploads/thumbnail/'.$ext)); 


     Product::findOrFail($id)->update([
         'category_id'          =>$request->category_id,
         'subcategory_id'       =>$request->subcategory_id,
         'product_name'         =>$request->product_name,
         'product_summary'      =>$request->product_summary,
         'product_description'  =>$request->product_description,
         'product_price'        =>$request->product_price,
         'product_quantity'     =>$request->product_quantity,
         'product_thumbnail'    =>$ext,
         'updated_at'          => Carbon::now(),
       ]);



     }else{
        Product::findOrFail($id)->update([
         'category_id'          =>$request->category_id,
         'subcategory_id'       =>$request->subcategory_id,
         'product_name'         =>$request->product_name,
         'product_summary'      =>$request->product_summary,
         'product_description'  =>$request->product_description,
         'product_price'        =>$request->product_price,
         'product_quantity'     =>$request->product_quantity,
         // 'product_thumbnail'    =>$request->product_thumbnail,
         'updated_at'          => Carbon::now(),
       ]);
     }


    Session::flash('message','Data Update Successfully');
    return redirect()->route('product.view');


	}
//End method

	public function ProductDelete($id){

       $product  = Product::findOrFail($id);
      $image_path = public_path('/uploads/thumbnail/'.$product->product_thumbnail);

      if(file_exists($image_path)){
        File::delete($image_path);
      }

      $product->delete();

      Session::flash('warning','Product Deleted Successfully');
      return redirect()->back();

    }
//End method

}
