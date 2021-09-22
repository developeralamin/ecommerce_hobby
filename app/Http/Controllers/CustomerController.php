<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Sale;
use App\Models\Billing;
use App\Models\User;
use App\Models\Shipping;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

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

//end method

   public function profile()
  {
         $user = Auth::user();
         return view('frontend.customer.customer_profile.profile_settings',compact('user'));
  }
//End method

  public function Editprofile($id)
  {
           $this->data['editData'] = User::findOrFail($id);
          return view('frontend.customer.customer_profile.edit_profile_settings',$this->data);
  }

//End method





  public function Updateprofile(Request $request ,$id)
  {
             $data         = User::find(Auth::user()->id);
             $old_image    = $data->profile;

          if ($request->hasFile('profile')) {
           $image = $request->file('profile');
              $ext = time().'.'.$image->getClientOriginalExtension();

     Image::make($image)->resize(600, 622)->save(public_path('/uploads/profile/customer/'.$ext));

                    $data->name          = $request->name;
                    $data->email         = $request->email;
                   $data->address       = $request->address;
                   $data->gender        = $request->gender;
                   $data->mobile        = $request->mobile;
                   $data->profile       = $ext; 
         
          }
                        
            $data->save();
            Session::flash('message','Edit Profile Successfully');
            return redirect()->route('customerProfile');
  }
//End method



    public function customerPasswordView(){
     
           return view('frontend.customer.customer_profile.password_view');
    }

 //End method


    public function customerPasswordUpdate(Request $request){
         $validata = $request->validate([
            'oldpassword'  => 'required',
            'password'     => 'required|confirmed',
         ]);

      $haspassword = Auth::user()->password;

      if(Hash::check($request->oldpassword,$haspassword)){
          $user = User::find(Auth::id());
          $user->password = Hash::make($request->password);
          $user->save();
          Auth::logout();
          return redirect()->route('login');
      }else{
        return back();
      }

    }


//End method







}
