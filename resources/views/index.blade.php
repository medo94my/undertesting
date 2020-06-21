@extends('layouts.app')
@section('content')
    
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>
<div class="container">
    @include('flash-message')
</div>
<div class="container pb-4">

    <div class="row">
<div class="col-lg-12">
    
    <div class="hero__item set-bg" data-setbg="{{ asset('img/hero/banner.jpg') }}">
        <div class="hero__text">
            <span>FRUIT FRESH</span>
            <h2>Vegetable <br />100% Organic</h2>
            <p>Free Pickup and Delivery Available</p>
            <a href="#" class="primary-btn">SHOP NOW</a>
        </div>
    </div>
</div>
</div>
</div>
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('img/categories/cat-1.jpg') }}">
                            <h5><a href="#">Fresh Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('img/categories/cat-2.jpg') }}">
                            <h5><a href="#">Dried Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('img/categories/cat-3.jpg') }}">
                            <h5><a href="#">Vegetables</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('img/categories/cat-4.jpg"') }}">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('img/categories/cat-5.jpg"') }}">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
    
    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">Oranges</li>
                            <li data-filter=".fresh-meat">Fresh Meat</li>
                            <li data-filter=".vegetables">Vegetables</li>
                            <li data-filter=".fastfood">Fastfood</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach($products as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 mix {{$item->type}}">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{asset($item->image)}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#" onclick="add({{$item->id}},event)"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                        <h6><a href="{{route('product-view',$item->id)}}">{{$item->name}}</a></h6>
                        <h5>${{$item->price/100}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->
    
    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->
    
    <!-- Latest Product Section Begin -->
    <section class="latest-product spad mb-5 pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="section-title ">
                    <h2>Latest Product</h2>
                </div>
                <div class="categories__slider owl-carousel">
                    @foreach ($latests as $item)
                        
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset($item->image) }}">
                        <h5><a href="{{route('product-view',$item->id)}}">{{$item->name}}</a></h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->
   
    
@endsection