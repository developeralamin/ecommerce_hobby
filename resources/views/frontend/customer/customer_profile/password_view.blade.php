@extends('frontend.master')
@section('title')
   Customer| Dashboard
@endsection

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Password Change</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Home</a>
                            <span> <span class="text-success"> Password | Dashboard</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{--  @if(session()->get('message'))

    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>

  @endif --}}



<div class="container" style="padding: 10% 0;">

  <div class="container col-12  align-center">


     <div class="row">
          <div class="col-sm-3">
          	   <div class="card">
                  <div class="card-body">
                     <h5 class="text-center">Manage Profile</h5>
                  <a href="{{ route('customerDashboard') }}" class="btn btn-primary btn-sm btn-block">Orders</a>


                  <a href="{{ route('customerDashboard') }}" class="btn btn-danger btn-sm btn-block">Password Change</a>

                </div>
               </div>
		  </div>


		  <div class="col-sm-9">

	 <form action="{{ route('customerpassword.update') }}" method="post" enctype="multipart/form-data">

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

<a href="{{ route('customerProfile') }}" class="btn btn-rounded btn-primary">Back</a>

</div>
    
   

  </form>


		  </div>

	</div>

</div>
</div>





@endsection