@extends('layouts.app')

@section('content')
{{-- 
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

 --}}
 <div class="container">
     @include('flash-message')
 </div>
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container min-vh-100 ">
            <div class="card  border-0 bg-light ">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <h1 class="py-4">Thank you for shopping with us</h1>
                <a href="{{route('index')}}" class="btn btn-warning px-4 py-3 text-center my-3 rounded-0"> Continue Shopping</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
    
    @endsection
  