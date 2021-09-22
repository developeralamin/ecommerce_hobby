<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsLetter;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;


class NewsLetterController extends Controller
{


		public function newsView(){
			$this->data['news_letters']  = NewsLetter::all();
			return view('backend.newsletter.view_newsletter',$this->data);
  
		}

//End method

		public function newsDelete($id){
 			$delete = NewsLetter::findOrFail($id);

 			$delete->delete();

 			Session::flash('message','News Letter Delete Sucessfully');
 			return back();

		}

//End mthod
		public function contactView()
		{
			$this->data['contacts']  = Contact::all();
			return view('backend.contacts.view_contact',$this->data);
		}

//End method

		public function contactdelete($id)
		{
			$deletete = Contact::findOrFail($id);

 			$deletete->delete();

 			Session::flash('message','Contact Info Delete Sucessfully');
 			return back();

		}



}
