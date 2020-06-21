<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Mockery\Expectation;

class AddressController extends Controller
{
    public function edit($id){
        $address=Address::findOrfail($id);
        return view("address.edit",\compact('address'));
    }
    public function update(Request $req , $id)

    {
        $rules =[
            'firstname'=>'required|max:255|min:5|string',
                'lastname'=>'required|max:255|min:5|string',
                'country'=>'required|max:255|string',
                'streetaddress'=>'required|max:255|min:5',
                'extraAddress'=>'max:255',
                'city'=>'required|max:255|string',
                'state'=>'required|max:255|string',
                'zipcode'=>'required|numeric|min:5',
                'phone'=>'required|numeric|min:5',
            ];
             $req->validate($rules);
             Address::where('id',$id)->update(
                ['First' =>$req->input('firstname'),
                'Last' => $req->input('lastname'),
                'Country'=>$req->input('country'),
                'Address'=>$req->input('streetaddress').$req->input('extraAddress'),
                'City'=>$req->input('city'),
                'State'=>$req->input('state'),
                'PostCode'=>$req->input('zipcode'),
                'PhoneNo'=>$req->input('phone'),
                'default_add'=>$req->input('default_add')=='on' ? 1:0,
                'user_id'=>auth()->id()
                ]
                                         );
        return back()->with('success', "Address Has Been Upadted Successfully ");
    }
    public function create(Request $req)
    {
        if($req->input('default_add')=='on'){
                $adrs=Address::all();
                foreach ($adrs as $adr) {
                    Address::where('id',$adr->id)->update(
                        [
                        'default_add'=>0,
                        ] );
                }
        }
            $rules =[
                    'firstname'=>'required|max:255|min:5|string',
                        'lastname'=>'required|max:255|min:5|string',
                        'country'=>'required|max:255|string',
                        'streetaddress'=>'required|max:255|min:5',
                        'extraAddress'=>'max:255',
                        'city'=>'required|max:255|string',
                        'state'=>'required|max:255|string',
                        'zipcode'=>'required|numeric|min:5',
                        'phone'=>'required|numeric|min:5',
                    ];
                    $req->validate($rules);
                    
                
        Address::insert(
        ['First' =>$req->input('firstname'),
            'Last' => $req->input('lastname'),
            'Country'=>$req->input('country'),
            'Address'=>$req->input('streetaddress').$req->input('extraAddress'),
            'City'=>$req->input('city'),
            'State'=>$req->input('state'),
            'PostCode'=>$req->input('zipcode'),
            'PhoneNo'=>$req->input('phone'),
            'default_add'=>$req->input('default_add')=='on' ? 1:0,
            'user_id'=>auth()->id()
            ]
                    );
                // dump($req->input('default_add'));
        return redirect(route('checkout'));
    }
    public function show()
    {
        return view('address.create');
    }
    public function destroy ($id)
    
    {
         error_log($id); 
        try {
            Address::where('id',$id)->delete();
            return back()->with('success',"Address removed Successfully");
        } catch (Expectation $e) {
            //throw $th;
            return back()->with('error',$e->getExceptionMessage());
        }

    }
}
