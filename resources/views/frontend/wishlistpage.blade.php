@extends('frontend.master')
@section('content')
   <!-- Hero Section Begin -->

@section('title')

 WishList-Page | Product
@endsection


   <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>WishList Page</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Home</a>
                            <span>WishList</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->



   <!-- Shoping Cart Section Begin -->
 <form action="{{ route('SingleCartUpdate') }}" method="post">

                @csrf

    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">

     
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Cart</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                    


        @forelse($wishlist as $wish)

     {{-- <input type="hidden" name="cart_id[]" value="{{ $wish->id }}"> --}}
                    <tr>
                    <td class="shoping__cart__item">
                        <img width="40px" src="{{ url('uploads/thumbnail',$wish['product']['product_thumbnail']) }}" alt="{{ $wish['product']['product_name'] }}">

                            <h5>{{ $wish['product']['product_name'] }}</h5>
                        </td>

                        <td class="shoping__cart__price">
                            ${{ $wish['product']['product_price'] }}
                        </td>
    

                
    {{-- <td class="shoping__cart__price">
         <form method="POST" action="{{ route('SingleCartProduct',$wish->id) }}">
                @csrf
             <input type="hidden" name="product_price" value="{{  $wish['product']['product_price'] }}" >

              <button  class="btn btn-sm btn-danger">Add to Cart</button>
          </form>  
    </td> --}}

        <td><a style="color: red;" href="{{ route('WishListDelete',$wish->id) }}" id="delete"><i class="fa fa-times"></i></a> </td>       
                                   
           </tr>
    

         @empty
        
            <tr>
                 <td style="font-size: 23px;color: red;" colspan="50">
                   You haven't wishlist product item
                </td>
            </tr>
         


          @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

   
 </div>

     

            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
 </form>








@endsection    