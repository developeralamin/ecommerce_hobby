<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Shipping;
use App\Models\Billing;
use App\Models\Cart;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class PaymentController extends Controller
{
    //

    public function Payment(Request $request)
    {

  //  return $request->all();
  // die();

    	  $final_output = $request->session()->get('final_output');
    	 $discount =  $request->session()->get('discount');



   $shipping_id =  Shipping::insertGetId([
    		'user_id'       => Auth::user()->id,
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'company_name'  => $request->company_name,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'address'       => $request->address,
            'country'       => $request->country,
            'city'          => $request->city,
            'notes'         => $request->notes,
            'zip_code'      => $request->zip_code,
            'payment_status' => $request->payment_status,
            'created_at'    => Carbon::now(),
    	]);

    $sale_id = Sale::insertGetId([
       	  	'user_id'       => Auth::user()->id,
            'invoice_no'    => rand(1000000,9999999),
    		'shipping_id'   => $shipping_id,
    		'grand_total'   => $final_output,
    		'discount'      => $discount,
            'created_at'    =>Carbon::now(),
       ]);

       $user_ip = $_SERVER['REMOTE_ADDR'];
       $cartsss = Cart::where('user_ip',$user_ip)->with('product')->get();

    foreach ($cartsss as $key => $items) {
    	 Billing::insertGetId([
    		'user_id'          => Auth::user()->id,
            'sale_id'          => $sale_id,
            'shipping_id'      => $shipping_id,
    		'product_id'       => $items->product_id,       
    		'product_price'    => $items['product']['product_price'],
    		'qty'              => $items->qty,
            'created_at'       =>Carbon::now(),
    	]);

      Product::findOrFail($items->product_id)->decrement('product_quantity',$items->qty);
      $items->delete();    
    }

  return back()->with('message','Product CheckOut Successfully Done');

    }

//End method










}
