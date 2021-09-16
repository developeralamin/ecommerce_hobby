<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;



class CheckOutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

//End method



 public function CheckOut(Request $request){
           
        $discount =  $request->session()->get('discount');
        
	  	 $auth_user = Auth::user();
	     $user_ip = $_SERVER['REMOTE_ADDR'];
       $carts = Cart::where('user_ip',$user_ip)->with('product')->get();
  

   
      $subtotal = 0;
      foreach ($carts as $key => $cart) {
         $subtotal +=$cart->product_price*$cart->qty;
      }

  
      $total_with = $subtotal*$discount/100;
      $final_output = $subtotal-$total_with;
     
     session(['final_output' => $final_output]);

  
    return view('frontend.checkout_view',compact('subtotal','final_output','discount'));

 }

//End method





}
