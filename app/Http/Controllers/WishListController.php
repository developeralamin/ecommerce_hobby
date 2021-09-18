<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\WishList;


class WishListController extends Controller
{


    public function WishList($product_id)
    {
      $check_wishlist = WishList::where('product_id',$product_id)->where('user_id',Auth::id())->first();

        if(isset($check_wishlist)){
      Session::flash('message','Product WishList already exists');
       return back(); 

     }else{
     	WishList::insert([
  	     	'user_id'   =>Auth::id(),
  	     	'product_id' => $product_id,
  	     	'created_at' =>Carbon::now(),

  	     ]);
     }
  	     
       Session::flash('message','WishList Inserted Successfully');
       return back();   

    }
//End method here

    public function WishListPage()
    {
    	// returwishlist_idn 'ok';
    	// die();
    	$wishlist = WishList::where('user_id',Auth::id())->latest()->get();

    	return view('frontend.wishlistpage',compact('wishlist'));

    }

//End method

    public function WishListDelete($wishlist_id)
	{
		
		 WishList::where('id',$wishlist_id)->where('user_id',Auth::id())->delete();

     	Session::flash('warning',' WishList Product Delete Successfully');
         return back();
	}





}
