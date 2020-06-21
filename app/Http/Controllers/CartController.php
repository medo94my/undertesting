<?php

namespace App\Http\Controllers;

use App\Product;
use Mockery\Expectation;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->id())
        {
            $items = \Cart::session(auth()->id())->getContent();
            // dump($items);
            return view('shoping-cart',\compact('items'));
        }else{
            
            return redirect('/login')->with('error','Please login !!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if(auth()->id()){

            $item=Product::findOrfail($id);
            if ($item->discount == 0){
                \Cart::session(auth()->id())->add(array(
                    'id' => $item->id,
                    'name' => $item->name,
                    'price' => $item->price,
                    'quantity' => 1,
                    'attributes' => array(),
                    'associatedModel' => $item
                ));
            }else{
                $price_after_discount=round(($item->price/100)*(100-($item->discount)));
                \Cart::session(auth()->id())->add(array(
                    'id' => $item->id,
                    'name' => $item->name,
                    'price' =>$price_after_discount ,
                    'quantity' => 1,
                    'attributes' => array(),
                    'associatedModel' => $item
                ));
            }
            return \Cart::session(auth()->id())->getTotalQuantity();
        }else{
            return response()->json(['error'=>'can not perform this function',
            'error_code'=>400]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id)
    {
        \Cart::session(auth()->id())->update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => (int)request()->quntity
            ),
          ));
        //   error_log(request());
          $con=\Cart::getContent();
        return response()->json(['stauts'=>'success',
            'status_code'=>200,'content'=> $con]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            \Cart::session(auth()->id())->remove($id);
            return back()->with('success', "item remove successfully!!");
        }catch(Expectation $e){
     return back()->with('error', $e->getMassge);
        }
    }
    
    public function clear_cart(){
        return \Cart::session(auth()->id())->clear();
    }
    
}
