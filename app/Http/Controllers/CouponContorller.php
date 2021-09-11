<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;



class CouponContorller extends Controller
{
    
	public function couponView(){

		$this->data['coupons'] = Coupon::all();

		return view('backend.coupon.view_coupon',$this->data);

	}

//End method

	public function couponAdd(){
		return view('backend.coupon.add_coupon');
	}
//End method

	public function couponStore(Request $request){
		  $request->validate([
              'coupon_key' => 'required',                                      
              'discount' => 'required',                                      
         ]);

		  Coupon::insert([
		  	'coupon_key' =>$request->coupon_key,
		  	'discount'   =>$request->discount,
		  	'created_at' =>Carbon::now(),
		  ]);

		  Session::flash('message','Coupon Added Successfully');
		  return redirect()->route('coupon.view');
		

	}
//End method

	public function couponEdit($id){

       $this->data['editData'] = Coupon::findOrFail($id);
       return view('backend.coupon.edit_coupon',$this->data);

	}

//End method

	public function couponUpdate(Request $request ,$id){
        $request->validate([
           'coupon_key' => 'required',                                      
        ]);

         $data                      = Coupon::find($id);
        $data->coupon_key           = $request->coupon_key;
        $data->discount             = $request->discount;
        $data->save();


         Session::flash('message','Data Update Successfully');
        return redirect()->route('coupon.view');
	}

//End method


	public function couponDelete($id){
		 $data = Coupon::findOrFail($id);

         $data->delete();

         Session::flash('message','Data Delete Successfully');
         return back();
	}


//End method

	public function couponInActive($id){
     
		Coupon::findOrFail($id)->update([
			'status' =>0

		]);


  Session::flash('message','Coupon InActive Successfully');
		  return redirect()->route('coupon.view');

	}

//End method

	public function couponActive($id){

       Coupon::findOrFail($id)->update([
			'status' =>1
		]);

       Session::flash('message','Coupon Active Successfully');
		  return redirect()->route('coupon.view');

	}




}
