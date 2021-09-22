@extends('frontend.master')
@section('title')
  Customer Profile | E-eCommerce
@endsection

@section('content')



 <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><span class="text-success"> {{$user->name}} </span> Profile</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Home</a>
                            <span> <span class="text-success"> {{$user->name}} </span>| Dashboard</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  {{-- @if(session()->get('message'))

    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>

  @endif --}}

    <!-- .breadcumb-area end -->
   {{-- // Start Customer dashboard --}}
 @php
    
      $user = Auth::user();   
@endphp


<div class="container" style="padding: 10% 0;">
   {{--   @foreach($users as $user)
        <td>{{ $user->email }}</td>

     @endforeach --}}

  <div class="container col-12  align-center">

              
<div class="row">
 <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
         <h5 class="text-center">Manage Profile</h5>
    <a href="{{ route('customerDashboard') }}" class="btn btn-primary btn-sm btn-block">Orders</a>

      <a href="{{ route('customerpassword.view') }}" class="btn btn-danger btn-sm btn-block">Password Change</a>

      
      
    {{--   <a class="btn btn-danger btn-sm btn-block"  href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
    Logout
    </a> --}}

   
      </div>
    </div>
  </div>

  


    <div class="col-sm-8">  

    <div class="row"> {{-- /// 1st row --}}

    <div class="col-md-6" >   

         <h6 class="widget-user-desc">User Name : {{ $user->name }}</h6>
     
    {{-- <h6 class="widget-user-desc">User Type : {{ $user->role }}</h6> --}}
    <h6 class="widget-user-desc"> Email : {{ $user->email }}</h6>


     </div>

    


    <div class="col-md-6" >   
        <div class="form-group">
         
         <h6 class="widget-user-desc">Address : {{ $user->address }}</h6>

        </div>
     </div>

     <div class="col-md-6" >   
        <div class="form-group">
         
         <h6 class="widget-user-desc">Gender : {{ $user->gender }}</h6>

        </div>
     </div>

</div> {{-- /// End 1st row --}}

    <div class="row"> {{-- /// 2nd row --}}
    <div class="col-md-6" >   
        <div class="form-group">
         
         <h6 class="widget-user-desc">Mobile : {{ $user->mobile }}</h6>

        </div>
     </div>

</div> {{-- /// End 2nd row --}}
<div class="col-md-6" style="margin-bottom: 12px;" >   
         <div class="widget-user-image">
    <img class="rounded-circle" width="100px" 
     src="{{ (!empty($user->profile))? url('uploads/profile/customer/'.$user->profile):url('uploads/no_image.jpg') }}" alt="User Avatar">
  </div>
     </div>

</div> {{-- /// End 3rd row --}}
 <a href="{{ route('EditcustomerProfile',$user->id) }}" class="btn btn-rounded btn-success" style="margin: 0 auto;"> Edit Profile</a>
</div>
 
</div>
</br>
</br>
</br>

{{-- ///END METHOD --}}

 
  </div>





@endsection