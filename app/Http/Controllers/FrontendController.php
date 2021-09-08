<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;


class FrontendController extends Controller
{
    public function FrontPage()
    {
    	 $this->data['categories']  = Category::all();
    	 $this->data['products']   = Product::latest()->get();
    	 return view('frontend.main',$this->data);
    }
//End method

    public function AllProduct()
    {

    	 $this->data['products']   = Product::get();
    	  $this->data['categories']  = Category::all();
    	 return view('frontend.shop',$this->data);

    }






}
