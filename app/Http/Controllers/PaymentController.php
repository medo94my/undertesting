<?php

namespace App\Http\Controllers;
use Auth;
use Exception;
use Illuminate\Http\Request;
use Stripe\Exception\CardException;
use Stripe\Exception\ApiErrorException;
use Stripe\Exception\RateLimitException;
use Stripe\Exception\ApiConnectionException;
use Stripe\Exception\AuthenticationException;
use Stripe\Exception\InvalidRequestException;

class PaymentController extends Controller
{
   
    public function pay_proccess(Request $req){
       $user=$req->user();
       if(!$user){
           redirect('/regitser')->with('error', 'please register an account first');
       }
       try {
           //code...
           $cc_token=$req->stripe_token;
           $content=\Cart::session(auth()->id())->getContent()->map(function($item){
               return $item->name.",".$item->quantity;
           })->values()->toJson();
        //    dump($content);
           $user->charge($req->amount,$cc_token,[
               'Email'=>$req->email,
               'metadata'=> [
                   'contents'=>$content,
                   'quantity'=>\Cart::session($user->id)->getTotalQuantity()
               ],
           ]);
        //    SUCCESSFUL
           \Cart::clear();
            return redirect('/thankyou')->with('success',"payment is successfully paid ");
       } catch (CardException  $th) {
           return back()->with('error',$th->getError()->message);
           //throw $th;
        }catch(RateLimitException $e){
            return back()->with('error',$e->getError()->message);
       }catch (InvalidRequestException $e) {
        // Invalid parameters were supplied to Stripe's API
         return back()->with('error',$e->getError()->message);
      } catch (AuthenticationException $e) {
        // Authentication with Stripe's API failed
         return back()->with('error',$e->getError()->message);
        // (maybe you changed API keys recently)
         return back()->with('error',$e->getError()->message);
      } catch (ApiConnectionException $e) {
        // Network communication with Stripe failed
         return back()->with('error',$e->getError()->message);
      } catch (ApiErrorException $e) {
        // Display a very generic error to the user, and maybe send
         return back()->with('error',$e->getError()->message);
        // yourself an email
      } catch (Exception $e) {
        // Something else happened, completely unrelated to Stripe
         return back()->with('error',$e->getMessage());
      }
    // dump($req->all());
    }
    public function thankyou(){
        
        return view('thankyou');
    }
}
