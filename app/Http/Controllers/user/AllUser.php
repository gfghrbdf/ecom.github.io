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
use PDF;
// use Barryvdh\DomPDF\Facade\Pdf;



class AllUser extends Controller
{

    public function MyOrder(){
       $orders =  Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();

       
        return view('frontend.user.order.order_view',compact('orders'));
    }

    public function OrderDetails($id){

        $order = Order::with('division','district','state')->where('id',$id)->where('user_id',Auth::id())->first();     
        $orderItem = OrderItem::where('order_id',$id)->get();

        return view('frontend.user.order.order_details',compact('order','orderItem'));




    }

    public function OrderInvoice($id){

         $order = Order::with('division','district','state')->where('id',$id)->where('user_id',Auth::id())->first();     
        $orderItem = OrderItem::with('product')->where('order_id',$id)->orderBy('id','DESC')->get();


        $pdf = PDF::loadView('frontend.user.order.order_invoice',compact('order','orderItem'));
        return $pdf->download('invoice.pdf');



        // return view('frontend.user.order.order_invoice',compact('order','orderItem'));

       

        

    }
    
}
