@extends('frontend.master')
@section('content')
   <!-- Hero Section Begin -->

@section('title')

 CheckOut-Page | Product
@endsection


   <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
          
            <div class="checkout__form">
                <h4>Billing Details</h4>


           <form action="{{ route('Payment') }}" method="POST">

            @csrf

                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input value="{{ Auth::user()->name }}"  name="first_name"  type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input  name="last_name "  type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Company Name<span>*</span></p>
                                <input name="company_name"  type="text">
                            </div>

                             <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input  name="country" type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input name="address" type="text" placeholder="Street Address" class="checkout__input__add">
                            
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input name="city"alt=" " type="text">
                            </div>
                            
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input name="zip_code"alt=" " type="text">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input name="phone"  type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input value="{{ Auth::user()->email }}" name="email" type="text">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input name="notes" type="text"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
   



     @php
       $user_ip = $_SERVER['REMOTE_ADDR'];
       $carts = App\Models\Cart::where('user_ip',$user_ip)->with('product')->get();
     @endphp


                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                <ul>
                   @foreach($carts as $cart)
                    <li>{{$cart['product']['product_name']}}<span>${{ $cart->product_price*$cart->qty }}</span></li>
                   @endforeach 
                   
                   
                </ul>
     <div class="checkout__order__subtotal">Subtotal <span>${{$subtotal}}</span></div>

    <div class="checkout__order__subtotal">Discount <span>{{  $discount ?? ''}}%</span></div>

    <div class="checkout__order__total">Total <span>${{$final_output}}</span></div>


                            
                              {{--   <div class="checkout__input__checkbox">
                                   
                                        <input type="checkbox" name="payment"  value="payment" id="payment">
                                       
                                    <label for="payment">
                                        Check Payment
                                      </label>   
                                </div>
 --}}
                <div class="checkout__input__checkbox">
                                     
                    <input id="HandCash" type="radio"  required="" name="payment_status" value="HandCash">
                    <label for="HandCash">HandCash</label>
                                    
                </div>

                    <div class="checkout__input__checkbox"> 
                          <input id="Online" type="radio" name="payment_status" value="Online">
                          <label for="Online">Online</label> 
                                    
                </div>


               <button type="submit" class="site-btn">PLACE ORDER</button>


                            </div>
                        </div>
                    </div>


                </form>

                {{-- End form section --}}




            </div>
        </div>
    </section>
    <!-- Checkout Section End -->



 @endsection   