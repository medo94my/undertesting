<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->

}
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <!-- Google Font -->
     <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
   
     <script src="https://kit.fontawesome.com/52d77073d0.js" crossorigin="anonymous"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
 <!-- Styles -->
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    @yield('css')
</head>
<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}
<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        {{-- <img src="{{ asset('img/logo.png') }}" alt=""> --}}
    <a href="{{url('/')}}"><h2>MARTIFY</h2></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            @guest
            <li>
                <a  href="{{ route('login') }}"><i class="fa fa-sign-in"></i></a>
            </li>
            @if (Route::has('register'))
                <li>
                    <a href="{{ route('register') }}"><i class="fa fa-user"></i></a>
                </li>
            @endif
        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle text-danger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <img src="{{ asset('img/latest-product/lp-1.jpg') }}" class="rounded-circle mr-2" alt="profile" width="30" height="30"/><span>{{ Auth::user()->name }}</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">
                    My Account
                </a>
                <a class="dropdown-item" href="#">
                    My Purchase
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.queryselector('.logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form class="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
            {{-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> --}}
            <li><a href="#"><i class="fa fa-shopping-bag"></i> @if(auth()->id()) <span>{{Cart::session(auth()->id())->getTotalQuantity()}}</span>@endif</a></li>
        </ul>
        {{-- <div class="header__cart__price">item: <span>$150.00</span></div> --}}
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="./index.html">Home</a></li>
            <li><a href="./shop-grid.html">Shop</a></li>
            {{-- <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="{{ url('/shop-details', []) }}">Shop Details</a></li>
                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                    <li><a href="./checkout.html">Check Out</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                </ul>
            </li> --}}
          
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
   
</div>
<!-- Humberger End -->
<!-- Header Section Begin -->
<header class="header">
  
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        {{-- <img src="{{ asset('img/logo.png') }}" alt=""> --}}
                    <a href="{{url('/')}}"><h2>MARTIFY</h2></a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <nav class="header__menu">
                        <ul class="d-flex justify-content-center align-items-center">
                            <li class="active"><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{ url('/shop') }}">Shop</a></li>
                            {{-- <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{ url('/shop/item-details') }}">Shop Details</a></li>
                                    <li><a href="{{ url('/shop/cart') }}">Shoping Cart</a></li>
                                    <li><a href="{{ url('/shop/checkout') }}">Check Out</a></li>
                                </ul>
                            </li> --}}
                            <li><a href="{{ url('/contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-4">
                    <div class="header__cart">
                        <ul> @guest
                            <li>
                                <a href="{{ route('login') }}"><i class="fa fa-sign-in"></i></a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}"><i class="fa fa-user"></i></a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-danger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{asset('img/latest-product/lp-1.jpg')}}" class="rounded-circle mr-2" alt="Cinque Terre" width="30" height="30">{{ Auth::user()->name }}</span>
                                </a>
                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">
                                        My Account
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        My Purchase
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                            {{-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> --}}
                        <li><a href="{{url('shop/cart')}}" id="qty"><i class="fa fa-shopping-bag"></i> {!! auth()->id() ? Cart::session(auth()->id())->getTotalQuantity()==0 ? '' : '<span id="cart-qty">'.Cart::session(auth()->id())->getTotalQuantity().'</span>':('')!!}</a></li>
                        {{-- <li class="header__cart__price">item: <span>${{ auth()->id() ? Cart::session(auth()->id())->getTotal()/100:0 }}</span></li> --}}
                    </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
      <!-- Hero Section Begin -->
      <section class="hero pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul style="display: none">
                            @foreach (\App\Catrgories::all() as $category )
                            <li><a href="{{route('category',$category->slug)}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#" id="search_bar">
                                {{-- <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div> --}}
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        {{-- <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div> --}}
                    </div>
                    {{-- <div class="hero__item set-bg" data-setbg="{{ asset('img/hero/banner.jpg') }}">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="#" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- Header Section End -->

            @yield('content')
    </div>
    <!-- Js Plugins -->
    @yield('js')
    <script>
        
        qty=document.querySelector('#cart-qty')
        update=document.querySelector('#qty')
        function updateQty(data){
            try{
            // qty.remove()
            var tag = document.createElement("span");
            var text = document.createTextNode(data);
            tag.appendChild(text);
            update.appendChild(tag);
            }catch(e){
                console.log(e)
            }

        }
       function add(id,e){
        e.preventDefault()
        axios.get(`/shop/details/addtocart/${id}`)
        .then(function(response){
            // console.log(response.data.error_code)
            if(response.data.error_code===400){
                window.location.replace('/login');
            }else{
            updateQty(response.data)

            }
        }).catch(function(error){
            console.log(error)
        })
       }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
     <script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>
     <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
     <script src="{{URL::asset('js/jquery.nice-select.min.js')}}"></script>
     <script src="{{URL::asset('js/jquery-ui.min.js')}}"></script>
     <script src="{{URL::asset('js/jquery.slicknav.js')}}"></script>
     <script src="{{URL::asset('js/mixitup.min.js')}}"></script>
 <script src="{{URL::asset('js/owl.carousel.min.js')}}"></script>
 <script src="{{URL::asset('js/main.js')}}"></script>
 <script>
     
        $(".toast").toast("show")

</script>
</body>
</html>
