<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;


class VisitorController extends Controller
{
     
     public function Visitorareaere()
     {
     	 
         $this->data['getVisitor']  = Visitor::orderBy('id','desc')->Simplepaginate(5);

         return view('backend.visitor',$this->data);
     }


}
