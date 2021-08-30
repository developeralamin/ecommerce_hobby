<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;


class SubCategoryController extends Controller
{

		public function subcategoryView(){

           $this->data['ccount'] = SubCategory::count();
           $this->data['allData'] = SubCategory::Simplepaginate(4);

	    	return view('backend.subcategory.subcategory_view',$this->data);
		}

		public function subcategoryAdd(){
		 $this->data['category']  = Category::all();
         return view('backend.subcategory.subcategory_add',$this->data);
		}

		public function subcategoryStore(Request $request){
           $request->validate([
             'sub_category_name' => 'required',                                       
              'category_id' => 'required',                                       
         ]);

  	   // $data = new Category();
  	   // $data->category_name =$request->category_name;
  	   // $data->save();

  		SubCategory::insert([
  			'sub_category_name' =>$request->sub_category_name,
  			'category_id' =>$request->category_id,
  			'created_at'   =>Carbon::now(),
  		]);

         Session::flash('message','Data Inserted Successfully');
  		 return redirect()->route('subcategory.view');

		}

		public function subcategoryEdit($id){
          $this->data['category']  = Category::all();
          $this->data['editData']  = SubCategory::findOrFail($id);

           return view('backend.subcategory.subcategory_edit',$this->data);
		}

		public function subcategoryUpdate(Request $request ,$id){
			   $request->validate([
        'sub_category_name' => 'required',                                      
    ]);

       // $data = new Category();
       // $data->category_name =$request->category_name;
       // $data->save();
        $data                        = SubCategory::find($id);
        $data->sub_category_name     = $request->sub_category_name;
        $data->category_id           = $request->category_id;
        $data->save();

  
      Session::flash('message','Data Updated Successfully');
       return redirect()->route('subcategory.view');
		}


		public function subcategoryDelete($id){

		$data = SubCategory::findOrFail($id);

         $data->delete();

         Session::flash('message','Data Delete Successfully');
         return back();
		}


}
