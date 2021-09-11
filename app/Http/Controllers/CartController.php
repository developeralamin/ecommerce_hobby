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
    
	public function SingleCart()
	{
		 $user_ip = $_SERVER['REMOTE_ADDR'];

		 $carts = Cart::where('user_ip',$user_ip)->get();
		 $sub_total = Cart::all()->where('user_ip',$user_ip)->sum(function($total){
      return  $total->product_price * $total->qty ;

       });
		 return view('frontend.cart',compact('carts','sub_total'));
	}

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
		  foreach ($request->cart_id as $key => $item) {
     	    	Cart::findOrFail($item)->update([
                    'qty'  => $request->qty[$key]
     	    	]);
     	    }
      Session::flash('message','Cart Product Update Successfully');
      return back();
	}
//End method

	public function CouponApply(Request $request)
	{
		 
		$coupon = Coupon::where('coupon_key',$request->coupon_key)->first();

		if($coupon){
			
					Session::put('coupon',[
						'coupon_key' =>$coupon->coupon_key,
						'discount'   =>$coupon->discount,
					]);

			  Session::flash('message','Coupon Added Successfully');
               return back();

		}

		else{
		Session::flash('message','Coupon Data Not Match');
       return back();

		}

	}



}
