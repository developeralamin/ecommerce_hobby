@extends('backend.master')

@section('content')
  <!-- Begin Page Content -->
              
<div class="container col-12  align-center">

                @if ( session()->get('message') )
                    <div class="alert alert-success" role="alert">
                       {{ session()->get('message') }}
                  </div>
                @endif


  <h4 class="card-header  text-center" style="background: #000000;color: white">Add SubCategory </h4>
  <form action="{{ route('subcategory.store') }}" method="post" enctype="multipart/form-data">

   @csrf

  <div class="row">
    <div class="col-12">  

    <div class="row"> {{-- /// 1st row --}}

    <div class="col-md-6" >   
        <div class="form-group">
          <label for="email">SubCategory Name:</label>
          <input type="text"  class="form-control" id="sub_category_name" placeholder="" name="sub_category_name">


     <font style="color: red">
          {{ ($errors->has('sub_category_name'))?($errors->first('sub_category_name')):'' }}
       </font>

        </div>
     </div>

     
</div> {{-- /// End 3rd row --}}
<div class="col-md-6" >   
        <div class="form-group">
          <label for="email">Category Name:</label>
         <select class="form-control" name="category_id" id="category_id">
           <option>Select Category</option>

 @foreach($category as $category)
             <option value="{{$category->id}}">{{$category->category_name}}</option>
@endforeach

         </select>

     <font style="color: red">
          {{ ($errors->has('category_id'))?($errors->first('category_id')):'' }}
       </font>

        </div>
     </div>
 <button type="submit" class="btn btn-success">Submit</button>

</div>

</div>
    
   

  </form>

</div>


@endsection