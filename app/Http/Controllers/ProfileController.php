<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
    public function ViewProfile()
    {
    	$id    = Auth::user()->id;
    	$user  = User::find($id);

    	return view('backend.users.view_profile',compact('user'));
    }
//End method



 public function EditProfile()
    {
    	$id 			     = Auth::user()->id;
    	$editData            = User::find($id);

    	return view('backend.users.edit_profile',compact('editData'));
    }

//End method


	public function StoreProfile(Request $request)
	{

    $data  = User::find(Auth::user()->id);

     // $old_image    = $data->profile;
  if ($request->hasFile('profile')) {
   $image = $request->file('profile');
      $ext = time().'.'.$image->getClientOriginalExtension();
     Image::make($image)->resize(600, 622)->save(public_path('/uploads/profile/'.$ext)); 
  }
		  
           $data->name          = $request->name;
           $data->email         = $request->email;
           $data->address       = $request->address;
           $data->gender        = $request->gender;
           $data->mobile        = $request->mobile;
           // $data->profile      = $ext;
                
            $data->save();

            Toastr::success('Profile Successfully Updated :)' ,'Success');
            return redirect()->route('profile.view');
	}

  //End method


  public function PasswordView()
  {
  	return view('backend.users.password_view');
  }

//END METHOD

  public function PasswordUpdate(Request $request)
  {
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

	

}



