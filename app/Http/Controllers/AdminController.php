<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
// use App\Models\Product;
use App\Models\Category;


class AdminController extends Controller
{
     public function index()
     {

     	  $grand_total      = Sale::sum('grand_total');
         $product_quantity    = Product::sum('product_quantity');
         $product             = Product::count('product_name');
         $Category          = Category::count('id');
 

     	  return view('backend.dashboard',compact('grand_total','product_quantity','product','Category'));

     }
}
