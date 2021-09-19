<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Sale;
use App\Models\Billing;
use App\Models\Shipping;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;



class CustomerController extends Controller
{
    
  public function index()
  {

  	    $orders     = Sale::where('user_id',Auth::id())->latest()->get();
    	$user_bills = Billing::where('user_id',Auth::id())->with('product')->get();
    	$Shippings = Shipping::where('user_id',Auth::id())->get();
        // $user = Auth::user();
    	 return view('frontend.customer.customer_dashboard',compact('orders','user_bills','Shippings'));
  	 
  }


}
