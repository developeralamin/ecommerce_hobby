<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;


class FrontendController extends Controller
{
    public function FrontPage()
    {
    	 $this->data['categories']  = Category::all();
    	 $this->data['products']   = Product::latest()->get();
    	 return view('frontend.main',$this->data);
    }
    
//End method

    public function AllProduct()
    {

    	 $this->data['pcount']   = Product::count();
    	 $this->data['products']   = Product::cursorPaginate(4);
    	  $this->data['categories']  = Category::all();
    	 return view('frontend.shop',$this->data);

    }

//End method


    public function SingleProduct($slug)
    {
    	 $products = Product::where('slug',$slug)->first();

    	 $realted_product = Product::where('category_id',$products->category_id)->limit(4)->inRandomOrder()->get(); 

    	 return view('frontend.single_product',compact('products','realted_product'));
    }

//End method

    public function CategoryWiseProduct($cat_id)
    {
    	   $cat_product = Product::where('category_id',$cat_id)->latest()->cursorPaginate(9);
    	   $categories  = Category::all();
    	   return view('frontend.cat_wise_product',compact('cat_product','categories'));
    }


//End method

    public function SingleCartProduct(Request $request ,$product_id)
    {
    	  $user_ip = $_SERVER['REMOTE_ADDR'];
    	  $check = Cart::where('product_id',$product_id)->where('user_ip',$user_ip)->first();
    	  if ($check) {
    	  	
    	     Cart::where('product_id',$product_id)->where('user_ip',$user_ip)->increment('qty');

    	Session::flash('message','Add to Cart Successfully');
        return back();


    	  }else{

    	  Cart::insert([
    	  		 'product_id'       => $product_id,
                 'user_ip'          => $user_ip,
                 'qty'              =>1,
                 'product_price'    =>$request->product_price,
                 'created_at'       => Carbon::now(),
    	  ]);

    	  }

    	Session::flash('message','Add to Cart Successfully');
        return back();


    }


}
