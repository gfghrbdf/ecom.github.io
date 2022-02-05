<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Auth;

class OrderController extends Controller
{
    public function Pandingorder(){

        $pandingData = Order::where('status','Pending')->orderBy('id','DESC')->get();

        return view('backend.order.panding_order',compact('pandingData'));

        
    }
}
