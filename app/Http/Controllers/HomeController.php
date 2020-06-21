<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $products=Product::inRandomOrder()->take(8)->get();
        $last_added=Product::orderBy('created_at','desc')->take(8)->get();
        return view('index',['products'=>$products,
        'latests'=>$last_added,]);
    }
    
}
