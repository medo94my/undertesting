<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class AddressController extends Controller
{
    public function edit($id){
        $address=Address::findOrfail($id);
        return view("address.edit",\compact('address'));
    }
    public function update(Request $req , $id)

    {
        $input =Address::find($id);
        
        $input->First=$req->input('firstname');
        $input->Last=$req->input('lastname');
        $input->Country=$req->input('country');
        $input->Address=$req->input('streetaddress').$req->input('extraAddress');
        $input->City=$req->input('city');
        $input->State=$req->input('state');
        $input->PostCode=$req->input('zipcode');;
        $input->PhoneNo=$req->input('phone');
        $input->save();
        return Redirect('/shop');
    }
    public function create(Request $req)
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
                
 
            $address = new Address;
            $address->firstName=$req->input('firstname');
            $address->lastName=$req->input('lastname');
            $address->Country=$req->input('country');
            $address->Address=$req->input('streetaddress').$req->input('extraAddress');
            $address->City=$req->input('city');
            $address->State=$req->input('state');
            $address->PostCode=$req->input('zipcode');;
            $address->PhoneNo=$req->input('phone');
            $address->user_id=auth()->id();
            error_log(auth()->id());
            $address->save();
 
        return back()->with('success', "Address has been added successfully");
    }
}
