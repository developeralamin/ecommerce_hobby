@extends('frontend.master')
@section('content')
   <!-- Hero Section Begin -->

@section('title')
 Shopping-Cart | Product
@endsection


  <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Home</a>
                            <span>Shopping Cart</span>
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
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                    @php

                     $total = 0 ;
                    @endphp


        @forelse($carts as $cart)

         <input type="hidden" name="cart_id[]" value="{{ $cart->id }}">

                    <tr>
                    <td class="shoping__cart__item">
                        <img width="40px" src="{{ url('uploads/thumbnail',$cart['product']['product_thumbnail']) }}" alt="{{ $cart['product']['product_name'] }}">

                            <h5>{{ $cart['product']['product_name'] }}</h5>
                        </td>
                        <td class="shoping__cart__price">
                            ${{ $cart['product']['product_price'] }}
                        </td>
    <td class="shoping__cart__quantity">
        <div class="quantity">
            <div class="pro-qty">
                <input type="text" name="qty[]" value="{{  $cart->qty }}" min="1">
            </div>
        </div>
    </td>

                <td class="shoping__cart__total">
                    ${{ $cart['product']['product_price'] *  $cart->qty }}
                </td>

             <td><a style="color: red;" href="{{ route('DeleteCart',$cart->id) }}" id="delete"><i class="fa fa-times"></i></a> </td>       
                                   {{--  <td class="shoping__cart__item__close">
                                        <span class="icon_close"></span>
                                    </td> --}}
                                </tr>
        @php

           $total +=$cart->product_price*$cart->qty;

         @endphp

         @empty
        
            <tr>
                 <td style="font-size: 23px;color: red;" colspan="50">
                   You haven't cart item
                </td>
            </tr>
         


          @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('AllProduct') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>

                <button href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</button>

                    </div>
                   
                </div>

                         <div class="col-lg-6">
                @if(Session::has('coupon'))
                @else

       
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>

             {{--    <form action="{{ route('CartCoupon') }}" method="POST">

                	@csrf --}}

                  <input  class="cuponvalue" class="form-control" value="" type="text" placeholder="Cupon Code">
                  <span  type="submit" class="coupnbtn btn btn-success" >Apply Cupon</span>
              {{--   </form> --}}

                        </div>
                    </div>
               
         @endif
 </div>

     

                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                    
                            <li>Subtotal <span>${{$total }}</span></li>

            @php

                $atTotal = $total* @$discount/100;
                $finalcalculate = $total-$atTotal;
            @endphp 

                <li>Coupon Name<span></span></li>
                <li>Discount <span>$
                 {{  @$discount ?? ''}}%({{$atTotal}} tk)</span></li>

                <li>Total <span>${{ $finalcalculate }}</span></li>
                           
                         
                          
                             
                        </ul>


                     {{--    <ul> --}}

                         {{--    @if(Session::has('coupon'))

                            <li>Subtotal <span>${{ $total }}</span></li>
                            <li>Coupon Name<span>{{ session()->get('coupon')['coupon_key']  }}</span></li>
                            <li>Discount <span>{{ session()->get('coupon')['discount'] }}%
                             ({{  $discount = $total * session()->get('coupon')['discount']/100 }} tk)</span></li>
                             
                               <li>Total <span>${{ $total - $discount }}</span></li>
                            @else
                          <li>Subtotal <span>${{$total}}</span></li>
                            @endif
                             
                        </ul>  --}}
                        <a target="__blank" href="{{ route('CheckOut') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
 </form>




@endsection




@section('footer_js')



<script type="text/javascript">

$(function(){
  
     $('.coupnbtn').click(function(){
            var cuponvalue = $('.cuponvalue').val();
            window.location.href = "{{ url('cart-show') }}/"+cuponvalue;
    });

   
 });

</script> 



@endsection