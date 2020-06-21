@extends('layouts.app')

@section('content')
    
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>
    
    <!-- Breadcrumb Section Begin -->
    {{-- <section class="breadcrumb-section set-bg" data-setbg="{{asset('img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Martify Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Breadcrumb Section End -->
    <div class="container">
        @include('flash-message')
    </div>
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                                @foreach($categories as $cate)
                            <li><a href="{{route('category',$cate->slug)}}"  value='{{$cate->name}}'>{{$cate->name}}</a></li>
                                @endforeach
                                {{-- <li><a href="#">Vegetables</a></li>
                                <li><a href="#">Fruit & Nut Gifts</a></li>
                                <li><a href="#">Fresh Berries</a></li>
                                <li><a href="#">Ocean Foods</a></li>
                                <li><a href="#">Butter & Eggs</a></li>
                                <li><a href="#">Fastfood</a></li>
                                <li><a href="#">Fresh Onion</a></li>
                                <li><a href="#">Papayaya & Crisps</a></li>
                                <li><a href="#">Oatmeal</a></li> --}}
                            </ul>
                        </div>
                        <form action="" method="get">
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                            data-min="1" data-max="2000">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                {{-- <input type="hidden" name="url" value="{{$_SERVER['REQUEST_URI'] }}"> --}}
                                    <input type="text" id="minamount" name="min">
                                    <input type="text" id="maxamount" name="max">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button class="btn btn-warning">submit</button>
                        </div>
                    </div>
                </form>
                    </div>
                
                </div>
                <div class="col-lg-9 col-md-7">
                  
                    @if(isset($discounted))
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>{{isset($discounted)?'Sale Off':''}}</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                @foreach($discounted as $sale)
                                @if ($sale->discount >0)
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                        data-setbg="{{asset($sale->image)}}">
                                    <div class="product__discount__percent">-{{$sale->discount}}%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a onclick="add({{$sale->id}},event)"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>{{$sale->type}}</span>
                                    <h5><a href="/shop/details/{{$sale->id}}">{{$sale->name}}</a></h5>
                                            <div class="product__item__price">${{round(($sale->price/100)*(100-($sale->discount)))/100}} <span>${{$sale->price /100}}</span></div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="">
                    @foreach ($_REQUEST as $key=>$val)
                    <div class="badge badge-pill badge-light px-2 py-1"><span class="text-primary"><strong class="text-dark">{{$key}}</strong>:{{$val}}</span><a href="http://127.0.0.1:8000/shop/" class="mx-2 text-danger"><i class="fas fa-times"></i></a></div>

                        @endforeach
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="0">Default</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                <h6><span>{{ isset($normalPrice) ? count($normalPrice) : ''}}</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @if(isset($normalPrice))
                        @foreach ($normalPrice as $item)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{asset($item->image)}}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="" onclick="add({{$item->id}},event)"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="/shop/details/{{$item->id}}">{{$item->name}}</a></h6>
                                    <h5>${{$item->price/100}}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        @foreach ($filtered as $item)
                        @if($item->discount > 0)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__discount__item">
                                <div class="product__discount__item__pic set-bg"
                                data-setbg="{{asset($item->image)}}">
                            <div class="product__discount__percent">-{{$item->discount}}%</div>
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="{{route('cart',$item->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__discount__item__text">
                            <h5><a href="/shop/details/{{$item->id}}">{{$item->name}}</a></h5>
                                    <div class="product__item__price ">${{round(($item->price/100)*(100-($item->discount)))/100}} <span class="text-danger">${{$item->price /100}}</span></div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{asset($item->image)}}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="" onclick="add({{$item->id}},event)"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="/shop/details/{{$item->id}}">{{$item->name}}</a></h6>
                                    <h5>${{$item->price/100}}</h5>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endif
                    </div>
                    {{-- <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
    
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
    @endsection