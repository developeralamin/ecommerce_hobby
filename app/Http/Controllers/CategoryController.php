<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;




class CategoryController extends Controller
{
	    public function CategoryView()
	    {
         $this->data['ccount'] = Category::count();
	    	 $this->data['allData'] = Category::Simplepaginate(5);

	    	 return view('backend.category.category_view',$this->data);
	    }

//End method

		public function CategoryAdd()
		{
            return view('backend.category.category_add');
		}

//End method


		public function CategoryStore(Request $request)
		{
          $request->validate([
              'category_name' => 'required|unique:categories|max:255',                                      
         ]);

  	   // $data = new Category();
  	   // $data->category_name =$request->category_name;
  	   // $data->save();

  		Category::insert([
  			'category_name' =>$request->category_name,
  			'created_at'   =>Carbon::now(),
  		]);

         Session::flash('message','Data Inserted Successfully');
  		 return redirect()->route('category.view');


		}

//End method

		public function CategoryEdit($id)
		{
          	$this->data['editData']  = Category::findOrFail($id);

          	return view('backend.category.category_edit',$this->data);


		}

//End method

		public function CategoryUpdate(Request $request , $id)
		{

		$request->validate([
           'category_name' => 'required',                                      
        ]);

        $data                       =  Category::find($id);
        $data->category_name        = $request->category_name;
        $data->save();

         Session::flash('message','Data Update Successfully');
        return redirect()->route('category.view');


		}
//End method

		public function CategoryDelete($id){

         $data = Category::findOrFail($id);

         $data->delete();

         Session::flash('message','Data Delete Successfully');
         return back();

		}
//End method

}
