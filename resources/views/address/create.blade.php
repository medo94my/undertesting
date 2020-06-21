@extends('layouts.app')

@section('content')
<div class="container">
    @include('flash-message')
</div>
<div class="container d-flex justify-content-center">

<div class="card w-75" >
    <h2 class="text-left pt-3 px-5">New Address</h2>
    <div class="card-body p-5">
        <form action="{{route('Address')}}" method="post">
            @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                <input type="text" name="firstname" value="{{old('firstname')}}">
                                </div>
                                
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" name="lastname" value="{{old('lastname')}}">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Country<span>*</span></p>
                            <input type="text" name="country" value="{{old('country')}}">
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" placeholder="Street Address" class="checkout__input__add" name="streetaddress" value="{{old('streetaddress')}}">
                            {{-- <input type="text" placeholder="Apartment, suite, unite ect (optinal)" name="extraAddress"> --}}
                        </div>
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <input type="text" name="city" value="{{old('city')}}">
                        </div>
                        <div class="checkout__input">
                            <p>Country/State<span>*</span></p>
                            <input type="text" name="state" value="{{old('state')}}">
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="text" name="zipcode" value="{{old('zipcode')}}">
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" name="phone" value="{{old('phone')}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="default_add" checked>
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                  </div>
                            </div>
        
                        </div>
                        {{-- <div class="checkout__input"> 
                            <p>Order notes<span>*</span></p>
                            <input type="text"
                                placeholder="Notes about your order, e.g. special notes for delivery." name="note">
                        </div> --}}
                    </div>
                </div>
                <button type="submit" class="btn btn-warning btn-xl w-100">Add</button>
        </form>
    </div>
</div>

</div>
@endsection