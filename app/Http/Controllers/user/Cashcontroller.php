<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class Cashcontroller extends Controller
{

        public function CashOrder(Request $request){

        if(Session::has('cupon')){

            $ammount = Session::get('cupon')['total_ammount'];
        }else{

            $ammount = Cart::total();

        }



    $OrderId =  Order::insertGetId(
        [

            'user_id'=>Auth::id(),
            'division_id'=>$request->divison,
            'district_id'=>$request->district,
            'state_id'=>$request->state,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'post_code'=>$request->code,
            'notes'=>$request->note,
            'payment_type'=>'Cash',
            'payment_method'=>'Cash',
           
            'currency'=>'Usd',
            'ammount'=>$ammount,
           
            'invoice_no'=>'EOS'.hexdec(uniqid()),
            'ordar_date'=>Carbon::now()->format('d F Y'),
            'ordar_month'=>Carbon::now()->format('F'),
            'ordar_year'=>Carbon::now()->format('Y'),          
            'status'=>'Pending',
            'created_at'=>Carbon::now(),
    ]);

    $invoice = Order::find($OrderId);

    $data = [

        'invoice_no' => $invoice->invoice_no,
        'ammount' => $invoice->ammount,
        'name' => $invoice->name,
        'email' => $invoice->email,

    ];


    Mail::to($request->email)->send(new OrderMail($data));

    $carts = Cart::content();

    foreach($carts as $cart){

        

         OrderItem::insert([

            'order_id'=>$OrderId,
            'product_id'=>$cart->id,
            'color'=>$cart->options->color,
            'size'=>$cart->options->size,
            'qty'=>$cart->qty,
            'price'=>$cart->subtotal,
             'created_at'=>Carbon::now(),

         ]);




    }

    if(Session::has('cupon')){
        Session::forget('cupon');
    }

    Cart::destroy();

    $notification = [

                'message' => 'Order Sussfully Delevered',

                'type' => 'success',
            ];


    return redirect()->route('dashboard')->with($notification);



    }
    
}
