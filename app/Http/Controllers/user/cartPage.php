<?php

namespace App\Http\Controllers\user;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Cupon;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class cartPage extends Controller
{

    public function CartView(){

        if (Session::has('cupon')) {

        $Cupon_Name = Session::get('cupon')['cupon_name'];

       $cupon_exist =  Cupon::where('cupon_name',$Cupon_Name)->first();

          Session::put('cupon',[

            'cupon_name' => $cupon_exist->cupon_name,
            'cupon_discount' => $cupon_exist->cupon_discount,
            'discount_ammount' => round(Cart::total() * $cupon_exist->cupon_discount / 100 ),
            'total_ammount' => round(Cart::total() - Cart::total() * $cupon_exist->cupon_discount / 100 )




        ]);
          
        }



        return view('frontend.wiselist.Cartview');
    }



    public function CartIncrement($id){

         $dat = Cart::get($id);

        Cart::update($id, $dat->qty + 1);

        
        if(Session::has('cupon')) {

        $Cupon_Name = Session::get('cupon')['cupon_name'];

       $cupon_exist =  Cupon::where('cupon_name',$Cupon_Name)->first();

          Session::put('cupon',[

            'cupon_name' => $cupon_exist->cupon_name,
            'cupon_discount' => $cupon_exist->cupon_discount,
            'discount_ammount' => round(Cart::total() * $cupon_exist->cupon_discount / 100 ),
            'total_ammount' => round(Cart::total() - Cart::total() * $cupon_exist->cupon_discount / 100 )




        ]);
          
        }




         

        

        return 1;

    


    }


        public function CartDecriment($id){

            $dat = Cart::get($id);

        Cart::update($id, $dat->qty - 1);

        if (Session::has('cupon')) {

        $Cupon_Name = Session::get('cupon')['cupon_name'];

       $cupon_exist =  Cupon::where('cupon_name',$Cupon_Name)->first();

          Session::put('cupon',[

            'cupon_name' => $cupon_exist->cupon_name,
            'cupon_discount' => $cupon_exist->cupon_discount,
            'discount_ammount' => round(Cart::total() * $cupon_exist->cupon_discount / 100 ),
            'total_ammount' => round(Cart::total() - Cart::total() * $cupon_exist->cupon_discount / 100 )




        ]);
          
        }

        

        return 1;

    


    }

    

    
}