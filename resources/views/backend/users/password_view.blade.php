@extends('backend.master')

@section('content')
  <!-- Begin Page Content -->
              
<div class="container col-12  align-center">

                @if ( session()->get('message') )
                    <div class="alert alert-success" role="alert">
                       {{ session()->get('message') }}
                  </div>
                @endif


  <h4 class="card-header  text-center" style="background: #000000;color: white">Update Password </h4>
  <form action="{{ route('password.update') }}" method="post" enctype="multipart/form-data">

   @csrf

  <div class="row">
    <div class="col-12">  

    <div class="row"> {{-- /// 1st row --}}

    <div class="col-md-6" >   
        <div class="form-group">
          <label for="email">Old Password:</label>
          <input type="password" id="current_password" name="oldpassword" class="form-control" >


     <font style="color: red">
          {{ ($errors->has('oldpassword'))?($errors->first('oldpassword')):'' }}
       </font>

        </div>
     </div>



<div class="col-md-6" >   
        <div class="form-group">
          <label for="email"> New Password</label>
         <input type="password" id="password" name="password" class="form-control" >


     <font style="color: red">
          {{ ($errors->has('password'))?($errors->first('password')):'' }}
       </font>

        </div>
     </div>
 

</div> {{-- /// End 1st row --}}



    <div class="row"> {{-- /// 2nd row --}}


     <div class="col-md-6" >    
        <div class="form-group">
          <label for="text">Confirm Password:</label>
          <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" > 

     <font style="color: red">
          {{ ($errors->has('password'))?($errors->first('password')):'' }}
       </font>

        </div>
     </div>

</div> {{-- /// End 2nd row --}}


</div> {{-- /// End 3rd row --}}


</div>
 <button type="submit" class="btn btn-success">Submit</button>
</div>
    
   

  </form>




@endsection