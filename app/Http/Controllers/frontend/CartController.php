<?php

namespace App\Http\Controllers\frontend;




use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cupon;
use Carbon\Carbon;

use App\Models\ShipDivition;
use App\Models\ShipDistrict;
use App\Models\ShipState;


use Illuminate\Support\Facades\Session;

use Auth;


use Gloudemans\Shoppingcart\Facades\Cart;



class CartController extends Controller
{
    public function cto(Request $request,$id){

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

       

      

         $dat = Product::find($id);



        if($dat->discount_price == null){

            

             Cart::add(['id' => $dat->id, 'name' => $request->pro_names, 'qty' => $request->quantitys, 'price' => $dat->seeling_price, 'weight' => 550, 'options' => ['image' => $dat->product_thumbnail,'size' => $request->sizes,'color' => $request->colors]]);

              return response()->json(array('success' => 'Product Added On Cart'));

            


           


        }else{

            


             Cart::add(['id' => $dat->id, 'name' => $request->pro_names, 'qty' => $request->quantitys, 'price' => $dat->discount_price, 'weight' => 550, 'options' => ['image' => $dat->product_thumbnail,'size' => $request->sizes,'color' => $request->colors]]);

             return response()->json(array('success' => 'Product Added On Cart'));

            


             
            

        }









       

    }


    public function MiniCart(){

        // carts data

       $carts =  Cart::content();

       // sonkha
       $cartCount =  Cart::count();

       // taka
       $cartTotal = Cart::total();

       return response()->json(array(

        'carts' => $carts,
        'Qunty' => $cartCount,
        'total' => round($cartTotal),


       ));





    }


    public function RemoveCartPro($id){

        Cart::remove($id);

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



      // if(Session::has('cupon')['discount_ammount'] == 0){
      //   Session::forget('cupon');
      // }

        


        return response()->json(array('dat'=>1));

    }

    // Cupon

    public function CuponCheck(Request $request){

       $cupon_exist =  Cupon::where('cupon_name',$request->cupon_name)->where('cupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();

       if($cupon_exist){



        Session::put('cupon',[

            'cupon_name' => $cupon_exist->cupon_name,
            'cupon_discount' => $cupon_exist->cupon_discount,
            'discount_ammount' => round(Cart::total() * $cupon_exist->cupon_discount / 100 ),
            'total_ammount' => round(Cart::total() - Cart::total() * $cupon_exist->cupon_discount / 100 )




        ]);

        return response()->json(array('succ'=>'Cupon Apply Successfully'));
        

       }else{
        return response()->json(array('err'=>'Cupon Not Exist'));
       }


        
    }

    public function CuponGet(){

        if(Session::has('cupon')){

            return response()->json(array(

                'subtotal' => Cart::total(),
                'cupon_name' => Session::get('cupon')['cupon_name'],
                'discount_ammount' => Session::get('cupon')['discount_ammount'],
                'total_ammount' => Session::get('cupon')['total_ammount'],



            ));


        }else{

            return response()->json(array('total'=>Cart::total()));


        }




    } 

    public function CuponRemove(){

        Session::forget('cupon');

        return response()->json(array('succ'=>'Cupon Remove Successfully'));

    }



    // Checkout 

    public function ChecKoutCreate(){

        if (Auth::check()) {

           if (Cart::total() > 0) {

            $cartcontent = Cart::content();
            $cartcount = Cart::count();
            $carttotal = Cart::total();

            $divisons =  ShipDivition::orderBy('id','DESC')->get();
            $districts =  ShipDistrict::orderBy('id','DESC')->get();
            

            return view('frontend.checkout.checkout_view',compact('cartcontent','cartcount','carttotal','divisons','districts'));
               
           }else{

             $notification = [

                'message' => 'ship Division Added Sussfully',

                'type' => 'success',
            ];
             return redirect()->to('/')->with($notification);

           }
        

        }else{

            $notification = [

                'message' => 'ship Division Added Sussfully',

                'type' => 'success',
            ];
             return redirect('login')->with($notification);
        }



        
    }






}
