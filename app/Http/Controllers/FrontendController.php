<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Cart;
use App\Models\NewsLetter;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Share;
use App\Models\Visitor;



class FrontendController extends Controller
{
    public function FrontPage()
    {
    	 $this->data['categories']     = Category::all();
         $this->data['products']      = Product::latest()->get();
    	 $this->data['news_letter']   = NewsLetter::latest()->get();

        $UserIp = $_SERVER['REMOTE_ADDR'];

        date_default_timezone_set('Asia/Dhaka');
        $timeDate = date('Y-m-d ,h:s:a');

        Visitor::insert([
          'ip_address'=>$UserIp,
          'visit_time'=>$timeDate
        ]);
    	 return view('frontend.main',$this->data);
    }
    
//End method

    public function AllProduct()
    {

    	 $this->data['pcount']      = Product::count();
    	 $this->data['products']    = Product::cursorPaginate(4);
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

//End method
    public function SingleCart()
    {
         $user_ip = $_SERVER['REMOTE_ADDR'];

         $carts = Cart::where('user_ip',$user_ip)->get();
         $sub_total = Cart::all()->where('user_ip',$user_ip)->sum(function($total){
      return  $total->product_price * $total->qty ;

       });
         return view('frontend.cart',compact('carts','sub_total'));
    }
//contact section
   

   public function ContactSingle()
   {
       return view('frontend.contact');
   }
//end method
   public function ContactHere(Request $request)
   {
         $this->validate($request,[
            'contact_name'         => 'required',
            'contact_email'        => 'required',
            'contact_msg'          => 'required',
        ]);

         Contact::insert([
            'contact_name'  =>$request->contact_name,
            'contact_email' =>$request->contact_email,
            'contact_msg'   =>$request->contact_msg,
         ]);
       
        Session::flash('message','Contact Successfully');
        return back();
   }


//End methodd

   public function news_letter(Request $request)
   {
        $this->validate($request,[
            'email'         => 'required',
            
        ]);

         NewsLetter::insert([
            'email'        =>$request->email,
             'created_at'   =>Carbon::now(),
         ]);
       
        Session::flash('message','News Letter Add Successfully');
        return back();

   }
//End method

   public function social_button()
   {
      // $sharess = Share::page('http://127.0.0.1:8000/', 'Social Share')
      //       ->facebook()
      //       ->twitter()
      //       ->linkedin('Extra linkedin summary can be passed here')
      //       ->whatsapp()->getRawLinks();

      // // dd($share);      
      // // return view('frontend.main',$this->data);
      //   return view('frontend.master',compact('sharess'));    
   }

//End method

   // public function Visitorarea()
   // {
   //     // $UserIp = $_SERVER['REMOTE_ADDR'];

   //     //  date_default_timezone_set('Asia/Dhaka');
   //     //  $timeDate = date('Y-m-d ,h:s:a');

   //     //  Visitor::insert([
   //     //    'ip_address'=>$UserIp,
   //     //    'visit_time'=>$timeDate
   //     //  ]);

   //      return view('frontend.main');
   // }



}
