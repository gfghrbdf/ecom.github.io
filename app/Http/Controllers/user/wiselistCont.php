<?php

namespace App\Http\Controllers\user;



use App\Models\wiselist;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class wiselistCont extends Controller
{
    public function Addtows($id){

        if(Auth::check()){

            $exist = wiselist::where('user_id',Auth::id())->where('product_id',$id)->first();

            if(!$exist){

                $ins = wiselist::insert(['user_id'=>Auth::id(),'product_id'=>$id]);

            if($ins){

                 return response()->json(array('success'=>'Add To wiselist'));

            }


            }else{
                return response()->json(array('ett'=>'Already exist'));
            }

            

           

          

          
        }else{
           return response()->json(array('ess'=>'Add First login'));
           
        }




    }

    public function wisListView(){



            return view('frontend.wiselist.wislistview');


       
        

    }

    public function wistListProduct(){

        $dat =  wiselist::with('product')->where('user_id',Auth::id())->get();

        return response()->json($dat);




    }

    public function wistListDelete($id){

       $dlt =  wiselist::where('product_id',$id)->delete();

       if ($dlt) {
           return 1;
       }else{
           return 0;

       }


    }



}
