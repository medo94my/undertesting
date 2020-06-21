<?php

namespace App\Http\Controllers;

use App\User;
use App\Address;
use \App\Product;
use \App\Catrgories;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Mockery\Expectation;

class ProductController extends Controller
{
    public function __construct()
    {

    }

    //product grid view 
   public function index(){
       $discounted=[];
       $normalPrice=[];
       $products=Product::all();
       foreach ($products as $product) {
           if ($product->discount>0){
            array_push($discounted,$product);
           }else{
            array_push($normalPrice,$product);
           }
        }
        // dump($discounted);
       $categories=Catrgories::all();
       $last_added=Product::orderBy('created_at','desc')->take(3)->get()   ;
       return view('shop-grid',
       ['discounted'=>$discounted,
        'normalPrice'=>$normalPrice,
        'categories'=>$categories,
        'latests'=> $last_added,
       ]);
   }

// product filtering
public function category(Request $req ,$category){
    $filter_price=[];
    $categories=Catrgories::all();
    $filtered=Product::where('type',$category)->get();
    if (isset($req->min)&&isset($req->max)){
        $min = preg_replace("/[^a-zA-Z0-9\s]/", "", $req->min);
        $max = preg_replace("/[^a-zA-Z0-9\s]/", "", $req->max);
        $min=$min*100;
        $max=$max*100;
        // echo $filtered;
        foreach ($filtered as $item) {
            if($item->discount > 0){
                $price_after_discount=round(($item->price/100)*(100-($item->discount)));
                if($price_after_discount > $min && $price_after_discount < $max ){
                    array_push($filter_price,$item);
                }
            }else{
                if($item->price > $min && $item->price< $max ){
                    array_push($filter_price,$item);
                }
            }
            # code...
        }
        // $filtered=Product::where('price','>',$min,'or')->where('price','<',$max,'and')->where('type',$category)->get();
        return view('shop-grid',
        ['filtered'=>$filter_price,
        'categories'=>$categories,
        ]);
    }
    return view('shop-grid',
    ['filtered'=>$filtered,
    'categories'=>$categories,
    ]);

}



public function show($id){
    $product=Product::findOrfail($id);
    return view('shop-details',['item'=>$product]);   
}


public function checkout(){
    $content=\Cart::session(auth()->id())->getContent();
if (count($content)> 0 ){
    $product = \Cart::session(auth()->id())->getContent();
    $total=\Cart::session(auth()->id())->getTotal();
    $address=User::findOrfail(auth()->id())->addresses;
    if(count($address)==0){
        return view('checkout',\compact('product','total'));

    }else{
        return view('checkout',\compact('product','total','address'));
    }
}else{
    return redirect('/shop')->with('error', "Cart is empty please add items to your cart first");
}
}


}
