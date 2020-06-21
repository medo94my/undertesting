@extends('layouts.app')
@section('content')
    

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    {{--  --}}

    <!-- Breadcrumb Section Begin -->
    {{-- <section class="breadcrumb-section set-bg " data-setbg="{{asset('img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('index')}}">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <div class="container">
        @include('flash-message')
    </div>
    <!-- Breadcrumb Section End -->
    @if(count($items) <= 0)

    <section class="checkout spad">
        <div class="container min-vh-100 ">
            <div class="card  border-0 bg-light ">
                <div class="card-body d-flex flex-column align-items-center justify-content-center">
                    <h1 class="py-4">your cart is empty </h1>
                <a href="{{route('shop')}}" class="btn btn-outline-warning px-3 py-2 text-center my-3"> Continue Shopping</a>
                </div>
            </div>
        </div>
    </section>


    @else
    <!-- Shoping Cart Section Begin -->
    <div class="container d-flex justify-content-end align-items-center mt-4">
        <button id='delete-items' href="#"class=" btn-warning cart-btn cart-btn-right btn"><i class="fas fa-broom mx-2"></i>Clear Cart</a>
    </div>
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
                                @if($items)
                                @foreach ($items as $item)
                                    
                                <tr data-id={{$item->id}}>
                                    <td class="shoping__cart__item">
                                        <img src="{{asset($item->associatedModel->image)}}" alt="" style="width:100px; hieght:100px">
                                        <h5>{{$item->name}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        ${{$item->price/100}}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                        <div class="pro-qty" data-id="{{$item->id}}">
                                                <input type="text" value="{{$item->quantity}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        ${{ Cart::get($item->id)->getPriceSum()/100}}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                            <form action="{{route('remove_item',$item->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class=" btn btn-xs btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                    <a href="{{route('shop')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <button  onclick="window.location.reload()" class="primary-btn cart-btn cart-btn-right btn"><span class="icon_loading"></span>
                            Upadate Cart</button>
                    </div>
                </div>
                {{-- <div class="col-lg-6">
                    <div class="shoping__continue">
                        {{-- <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div> 
                    </div>
                </div> --}}
                <div class="col-lg-12">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal<span>${{Cart::session(auth()->id())->getTotal()/100 }}</span></li>
                            <li>Total<span>${{Cart::session(auth()->id())->getTotal()/100 }}</span></li>
                        </ul>
                    <a href="{{route('checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endif
   
    @endsection

    @section('js')
        <script>
            item=document.querySelector('#delete-items');
            item.addEventListener('click',(e)=>{
                e.preventDefault();
                axios.delete('/clear_cart').then((res)=>{
                    // console.log(res);
                    window.location.href='/shop';
                }).catch((error)=>{
                    console.log(error)
                })
            })
        </script>
    @endsection