<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Bennar;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller

{


    public function CartShow($coupon = '')
    { 
//this is cat portion 
      
       $discount = 0;

     if($coupon == ''){
       $user_ip = $_SERVER['REMOTE_ADDR'];
       $carts = Cart::where('user_ip',$user_ip)->get();

      return view('frontend.cart',compact('discount','carts'));
        
     
       }
       else{
       	   // condition for coupon
       	   if (Coupon::where('coupon_key',$coupon)->exists()) {
               
       	$this->data['validity']  = Coupon::where('coupon_key',$coupon)->first()->coupon_validity;

     //Start second condition

     if(Carbon::now()->format('Y-m-d') <= $this->data['validity'] ){

      $user_ip = $_SERVER['REMOTE_ADDR'];

      $carts = Cart::where('user_ip',$user_ip)->get();

     $discount = Coupon::where('coupon_key',$coupon)->first()->coupon_discount;
        
     session(['discount' => $discount]);
 
     return view('frontend.cart',compact('carts','discount'));

       	   }
       
   	   else{
   	   	return back()->with('message','Coupon Date Expired');

   	   }
       	  //End second condition
            
       } else{

        return back()->with('message','Coupon Date Blank');
       }

         //End condition
      
       }
    }

//End method


	

//End method


	public function DeleteCart($cart_id)
	{
		 $user_ip = $_SERVER['REMOTE_ADDR'];
         Cart::where('id',$cart_id)->where('user_ip',$user_ip)->delete();

     		Session::flash('warning',' Cart remove Successfully');
           return back();
	}

//end method

	public function SingleCartUpdate(Request $request)
	{
		  foreach ($request->cart_id as $key => $items) {
     	    	Cart::findOrFail($items)->update([
                    'qty'  => $request->qty[$key]
     	    	]);
     	    }

      Session::flash('message','Cart Product Update Successfully');
      return back();
	}
//End method




}
