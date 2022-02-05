<?php

namespace App\Http\Controllers\Backend;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cupon;
use Carbon\Carbon;

class Cuponcontroller extends Controller
{

   public function CuponView(){

   $cupons =  Cupon::orderBy('id','DESC')->get();        


        return view('backend.cupon.cupon_view',compact('cupons'));
    }

    public function CuponStore(Request $request){

        $request->validate([

            'cupon_name'=>'required',
            'cupon_discoubt'=>'required',
            'cupon_validity'=>'required',


        ]);

       $name = $request->cupon_name;
       $discount = $request->cupon_discoubt;
       $validity = $request->cupon_validity;

       $ins = Cupon::insert(['cupon_name'=>strtoupper($name),'cupon_discount'=>$discount,'cupon_validity'=>$validity,'created_at'=>Carbon::now()]);

       if ($ins) {

        $notification = [

                'message' => 'cupon Added Sussfully',

                'type' => 'success',
            ];

        
           return redirect()->back()->with($notification);
       }








    }

    public function CuponDelete($id){

        $dlt = Cupon::where('id',$id)->delete();

        if ($dlt) {

        $notification = [

                'message' => 'cupon delete Sussfully',

                'type' => 'danger',
            ];

        
           return redirect()->back()->with($notification);
       }



    }

    public function CuponUpdate($id){

        $cupon = Cupon::find($id);

        return view('backend.cupon.cupon_edt',compact('cupon'));





    }

    public function CuponEdate(Request $request){

        $id = $request->cupon_hid;
        $name = $request->cupon_name;
        $dis = $request->cupon_discoubt;
        $val = $request->cupon_validity;
       
        


        $edt = Cupon::where('id',$id)->update(['cupon_name'=>strtoupper($name),'cupon_discount'=>$dis,'cupon_validity'=>$val,'updated_at'=>Carbon::now()]);


        if ($edt) {

        $notification = [

                'message' => 'cupon updated Sussfully',

                'type' => 'success',
            ];

        
           return redirect()->route('cupon.show')->with($notification);
       }

     



    }


    
}
