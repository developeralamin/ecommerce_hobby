@extends('frontend.master')
@section('content')
   <!-- Hero Section Begin -->

@section('title')
    Customer| Dashboard
@endsection


  <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Customer Dashboard</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Home</a>
                            <span>Customer| Dashboard</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


<div class="container" style="padding: 10% 0;">
   


    <div class="row">
  <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
         <h5 class="text-center">My Profile</h5>
        <a href="{{ url('/') }}" class="btn btn-primary btn-sm btn-block">Home</a>
        <a href="{{ route('customerProfile') }}" class="btn btn-success btn-sm btn-block">Settings Profile</a>

      <a class="btn btn-danger btn-sm btn-block"  href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
    Logout
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
      </div>
    </div>
  </div>


  <div class="col-sm-9">
    <div class="card">
       <table class="table table-bordered ">
    <thead>
      <tr>
       
        <th>Invoice No.</th>
        <th>Grand Total</th>
        <th>Discount</th>
  
      </tr>
    </thead>
    <tbody>
      @foreach($orders as $key=>$order)
      <tr>
        
         <td>{{$order->invoice_no}}</td>
         <td>{{$order->grand_total}} ৳</td>
         <td>{{$order->discount}}</td>
      </tr>
   @endforeach
    </tbody>


  </table>
    </div>
  </div>
</div>

</div>

 
   {{-- //Product show here --}}

<div class="container">  
   <div class="row">
        <table class="table table-bordered ">
    <thead>
      <tr>
         <th>First Name</th>
         <th>Last Name</th>
        <th>Company</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Country</th>
        <th>City</th>
        <th>Zip Code</th>
      </tr>
    </thead>
    <tbody>
 @foreach($Shippings as $shipping)

      <tr>

           <td>{{ $shipping->first_name }}</td>
           <td>{{ $shipping->last_name }}</td>
           <td>{{ $shipping->company_name }}</td>
           <td>{{ $shipping->phone }}</td>
           <td>{{ $shipping->email }}</td>
           <td>{{ $shipping->address }}</td>
           <td>{{ $shipping->country }}</td>
           <td>{{ $shipping->city }}</td>
           <td>{{ $shipping->zip_code }}</td>
         
      </tr>


@endforeach
    </tbody>


  </table>

   </div>
</div>

{{-- //product show here --}}

<div class="container">  
   <div class="row">
        <table class="table table-bordered ">
    <thead>
      <tr>
         <th>Image</th>
         <th>Product Name</th>
        <th>Quantity</th>
      </tr>
    </thead>
    <tbody>
      @foreach($user_bills as $key=>$itemsss)
      <tr>

           <td>
          <img width="120px" src="{{ url('/uploads/thumbnail/').'/'.$itemsss['product']['product_thumbnail'] }}">
        </td>
         <td>{{ $itemsss['product']['product_name'] }}</td>
         
         <td>{{ $itemsss->qty }}</td>
       
      </tr>
   @endforeach
    </tbody>


  </table>

   </div>
</div>





@endsection    