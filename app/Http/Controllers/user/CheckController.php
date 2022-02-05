<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping;


use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;


class CheckController extends Controller
{

    public function CheckoutStore(Request $request){



       $data = array();

       $data['shipping_name'] = $request->name;
       $data['shipping_email '] = $request->email;    
       $data['shipping_phone'] = $request->number;
       $data['post_code'] = $request->codes;      
       $data['note'] = $request->note;
       $data['divison_id'] = $request->division_name;
       $data['district_id'] = $request->district_name;
       $data['state_id'] = $request->state_name;

   

         if($request->payment_method == 'stripe'){

        $total = Cart::total();

        if($data['shipping_name']){

            return view('frontend.payment.stripe',compact('data','total'));

        }else{

            return redirect('/');

        }

        

       }elseif($request->payment_method == 'card'){

        return 'card';

       }else{

         $total = Cart::total();

        if($data['shipping_name']){

            return view('frontend.payment.cash',compact('data','total'));

        }else{

            return redirect('/');

        }
       

       }

   

    }
    
}
