@extends('backend.master')

@section('content')
  <!-- Begin Page Content -->
              
<div class="container col-12  align-center">

                @if ( session()->get('message') )
                    <div class="alert alert-success" role="alert">
                       {{ session()->get('message') }}
                  </div>
                @endif


  <h4 class="card-header  text-center" style="background: #000000;color: white">Add Coupon </h4>
  <form action="{{ route('coupon.update',$editData->id) }}" method="post" enctype="multipart/form-data">

   @csrf

  <div class="row">
    <div class="col-12">  

    <div class="row"> {{-- /// 1st row --}}

    <div class="col-md-6" >   
        <div class="form-group">
          <label for="email">Coupon Name:</label>
          <input type="text"  value="{{ $editData->coupon_key }}" class="form-control" id="coupon_key" placeholder="Coupon Name" name="coupon_key">


     <font style="color: red">
          {{ ($errors->has('coupon_key'))?($errors->first('coupon_key')):'' }}
       </font>

        </div>
     </div>

  <div class="col-md-6" >   
        <div class="form-group">
          <label for="email">Coupon Discount:</label>
          <input type="text" value="{{ $editData->discount }}"  class="form-control" id="discount" placeholder="Discount" name="discount">


     <font style="color: red">
          {{ ($errors->has('discount'))?($errors->first('discount')):'' }}
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