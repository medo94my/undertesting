@extends('layouts.app')
@section('css')
    {{-- <link  rel="stylesheet" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/floating-labels.css" type="text/css"> --}}
    <style>
        .form-label-group {
  position: relative;
  margin-bottom: 1rem;
}

.form-label-group > input,
.form-label-group > label {
  height: 3.125rem;
  padding: .75rem;
}

.form-label-group > label {
  position: absolute;
  top: 0;
  left: 0;
  display: block;
  width: 100%;
  margin-bottom: 0; /* Override default `<label>` margin */
  line-height: 1.5;
  color: #495057;
  pointer-events: none;
  cursor: text; /* Match the input under the label */
  border: 1px solid transparent;
  border-radius: .25rem;
  transition: all .1s ease-in-out;
}

.form-label-group input::-webkit-input-placeholder {
  color: transparent;
}

.form-label-group input:-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-ms-input-placeholder {
  color: transparent;
}

.form-label-group input::-moz-placeholder {
  color: transparent;
}

.form-label-group input::placeholder {
  color: transparent;
}

.form-label-group input:not(:placeholder-shown) {
  padding-top: 1.25rem;
  padding-bottom: .25rem;
}

.form-label-group input:not(:placeholder-shown) ~ label {
  padding-top: .25rem;
  padding-bottom: .25rem;
  font-size: 12px;
  color: #777;
}

/* Fallback for Edge
-------------------------------------------------- */
@supports (-ms-ime-align: auto) {
  .form-label-group > label {
    display: none;
  }
  .form-label-group input::-ms-input-placeholder {
    color: #777;
  }
}

/* Fallback for IE
-------------------------------------------------- */
@media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
  .form-label-group > label {
    display: none;
  }
  .form-label-group input:-ms-input-placeholder {
    color: #777;
  }
}
    </style>
@endsection
@section('content')

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

   

    <!-- Breadcrumb Section Begin -->
    {{-- <section class="breadcrumb-section set-bg " data-setbg="{{asset('img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Library</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data</li>
            </ol>
          </nav>
    </div> --}}
    <!-- Breadcrumb Section End -->
    <div class="container">
        @include('flash-message')
    </div>
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
           
            <div class="checkout__form">
                <h4>Billing Details</h4>
                @if(isset($address))
                <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                
                                    <th>Defalut Address</th>
                                    <th class="text-left">Full name</th>
                                    <th>Address</th>
                                    <th>Postcode</th>
                                    <th>Phone Number</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($address as $place)
                                
                                <tr >
                                    <td>
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="default_add" {{$place->default_add==1?'checked':''}}>
                                        {{-- <input type="radio" name="default_add" id="{{$place->id}}" value="{{$place->id}}" > --}}
                                    </td>
                                    <td class="text-left">
                                        {{-- <img src="{{asset($item->associatedModel->image)}}" alt="" style="width:100px; hieght:100px"> --}}
                                        <p>{{ucwords ($place->First .' '.$place->Last)}}</p>
                                    </td>
                                    <td class="">
                                    <p>{{$place->Address}}</p>
                                    </td>
                                    <td class="">
                                        <p>{{$place->City.'-'.$place->State.'-'.$place->PostCode}}</p>
                                    </td>
                                    <td class="">
                                        <p>{{$place->PhoneNo}}</p>
                                    </td>
                                                <td class="shoping__cart__item__close">
                                                    <div class="d-flex">
                                                        <form action="{{route('destroy_address',$place->id)}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                                <button class="btn btn-sm btn-danger mr-2"><i class="fas fa-trash"></i></button>
                                                            </form> 
                                                        <form action="{{route('update_address',$place->id)}}" method="get">
                                                                <button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                                                            </form>
                                                    </div>
                                                </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                <a href="{{route('Address-view')}}"  class="site-btn ">+ Add Address</a>
            </div>
            @else
            <form action="{{route('Address')}}" method="post">
                @csrf
            {{-- <input type="hidden" name="user_id" value="{{ Auth::user()->id}}"> --}}
          @if($errors->any())
            <div class="alert alert-danger">
                
                @foreach ($errors->all() as $error)
                    <p>
                        {{$error}}
                    </p>
                @endforeach
            </div>
            @endif

                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                    <input type="text" name="firstname" required value="{{ old('firstname')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="lastname" value="{{ old('lastname')}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name="country" value="{{ old('country')}}" required>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add" name="streetaddress" value="{{ old('streetaddress')}}" required>
                                <input type="text" placeholder="Apartment, suite, unite ect (optinal)" name="extraAddress" value="{{ old('extraAddress')}}">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="city"  value="{{ old('city')}}"  required>
                            </div>
                            <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text" name="state" value="{{ old('state')}}"  required>
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="zipcode" value="{{ old('zipcode')}}"  required>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input" required>
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone"  value="{{ old('phone')}}" required>
                                    </div>
                                </div>
            
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="default_add" {{$address->default_add==1?'checked':''}}>
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                      </div>
                                </div>
            
                            </div>
                            {{-- <div class="checkout__input"> 
                                <p>Order notes<span>*</span></p>
                                <input type="text"
                                    placeholder="Notes about your order, e.g. special notes for delivery." name="note">
                            </div> --}}
                            <button type="submit" class="site-btn ">Add Address</button>
                            
                        </form>
                        
                        </div>
                        @endif
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @if($product)
                                    @foreach ($product as $item)
                                <li>{{$item->name}}<span>${{ Cart::get($item->id)->getPriceSum()/100}}</span></li>
                                    @endforeach
                                    @endif
                                    {{-- <li>Fresh Vegetable <span>$151.99</span></li>
                                    <li>Organic Bananas <span>$53.99</span></li> --}}
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>${{$total/100}}</span></div>
                                <div class="checkout__order__total">Total <span>${{$total/100}}</span></div>
                                {{-- <div class="checkout__input__checkbox">
                                    <label for="acc-or">
                                        Create an account?
                                        <input type="checkbox" id="acc-or">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> --}}
                                {{-- <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.</p> --}}
                                    {{-- <div class="row"> 
                                         <div class="col-lg-12 "> 
                                            <h6 class="mb-0"><span class="icon_tag_alt "></span> Have a coupon? <a href="#">Click here</a> to enter your code
                                            </h6>
                                      </div> 
                                    </div> --}}
                                <form id="payment-form" method="post" action="{{route('pay_process')}}" >
                                                @csrf
                                            <div class="form-label-group">
                                                <input id="card-holder-name" type="text" id="cardname" name="cardholdername"class="form-control" placeholder="Card Holder Name" required autofocus>
                                                <label for="cardname">Card Holder</label>
                                            </div>
                                            
                                                    <!-- Stripe Elements Placeholder -->
                                            <div id="card-element" class="form-label-group"></div>
                                        <input type="hidden" id="amount" name="amount" value="{{$total}}">
                                        @if(isset($address))
                                        @foreach ($address as $place)
                                        <input type="hidden" id="address" name="address" value="{{$place->Address.','.$place->City.','.$place->State.','.$place->PostCode}}">
                                        @endforeach
                                        @else
                                        <input type="hidden" id="address" name="address" value="here, there,where,22344">
                                        @endif
                                                <div class="stripe-errors"></div>
                                            <button id="card-button" class=" btn btn-primary">
                                                PLACE ORDER
                                            </button>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
    
    @endsection
    @section('js')
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe = Stripe("{{env('STRIPE_KEY')}}");
    
        var style = {
                        base: {
                            color: '#32325d',
                            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                            fontSmoothing: 'antialiased',
                            fontSize: '16px',
                            '::placeholder': {
                            color: '#aab7c4'
                            }
                        },
                        invalid: {
                            color: '#fa755a',
                            iconColor: '#fa755a'
                        }
                    };
        const elements = stripe.elements();
        const cardElement = elements.create('card',{ style: style ,
            hidePostalCode:true,
        });
        // Set up Stripe.js and Elements to use in checkout form
    
        cardElement.mount('#card-element');
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const cardAmount = document.getElementById('amount');
        const form = document.getElementById('payment-form');
        const errors = document.querySelector('.stripe-errors');
        const addess=
        // console.log(address)
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const { paymentMethod, error } = await stripe.createPaymentMethod(
                'card', cardElement, {
                    billing_details: {
                        name: cardHolderName.value,
                        email:'{{Auth::user()['email']}}',
                    
                        @if(isset($address))
                        @foreach($address as $place)
                        @if($place['default_add']===1)
                        address:{
                            "city": '{{$place['City']}}',
                            "country": 'MY',
                            "line1": '{{$place['Address']}}',
                            "postal_code": '{{$place['PostCode']}}',
                            "state": '{{$place['State']}}'
                        }
                        @endif
                        @endforeach
                        @endif
                        
                                                                }
                }
            );

            if (error) {
                errors.classList.add('alert');
                errors.classList.add('alert-danger');
                var textnode = document.createTextNode(error.message);  
                errors.appendChild(textnode)
                cardButton.disabled=false
            } else {
                // The card has been verified successfully...
                // console.log(paymentMethod)
                var input = document.createElement("input");
                input.type = "hidden";
                input.name = "stripe_token";
                input.value = paymentMethod.id;
                form.appendChild(input);
                cardButton.disabled=true
                form.submit()
            }
        });
    </script>
    @endsection