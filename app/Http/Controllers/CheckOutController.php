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
           
            

    return view('frontend.checkout_view');

 }

//End method





}
