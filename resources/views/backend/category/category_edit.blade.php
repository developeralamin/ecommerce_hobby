@extends('backend.master')

@section('content')
  <!-- Begin Page Content -->
              
<div class="container col-12  align-center">

                @if ( session()->get('message') )
                    <div class="alert alert-success" role="alert">
                       {{ session()->get('message') }}
                  </div>
                @endif


  <h4 class="card-header  text-center" style="background: #000000;color: white">Edit Category </h4>
  <form action="{{ route('category.update',$editData->id) }}" method="post" enctype="multipart/form-data">

   @csrf

  <div class="row">
    <div class="col-12">  

    <div class="row"> {{-- /// 1st row --}}

    <div class="col-md-6" >   
        <div class="form-group">
          <label for="email">Category Name:</label>
          <input type="text"  value="{{ $editData->category_name }}" class="form-control" id="category_name" placeholder="" name="category_name">


     <font style="color: red">
          {{ ($errors->has('category_name'))?($errors->first('category_name')):'' }}
       </font>

        </div>
     </div>




</div> {{-- /// End 3rd row --}}
 <button type="submit" class="btn btn-success">Submit</button>

</div>

</div>
    
   

  </form>

</div>


@endsection