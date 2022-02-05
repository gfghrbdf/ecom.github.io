<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image as Image;
class brandController extends Controller
{
    public function BrandView(){

        $datast = Brand::latest()->get();

        return view('backend.brand.brand_view',compact('datast'));

      

    }



    public function BrandStore(Request $request){

       




        $request->validate([

            'brant_en'=>'required',

            'brant_hin'=>'required',

            'brant_image'=>'required',
        ],[

             'brant_en.required'=>'Input Brand English Is Required',

             'brant_hin.required'=>'Input Brand Hindi Is Required',


        ]);

         $brantName_eng = $request->input('brant_en');

          $brantName_hin = $request->input('brant_hin');

         $brand_img =  $request->file('brant_image');

         $file_name =  $brand_img->getClientOriginalName();

           $uniq_name = hexdec(uniqid()).'_'.$file_name;

           Image::make($brand_img)->resize(300, 300)->save('upload/brand/'.$uniq_name);

           $location =  'upload/brand/'.$uniq_name;
           



           
           $ins = Brand::insert(['brant_en'=>$brantName_eng,'brant_hin'=>$brantName_hin,'brant_slug_en'=>strtolower(str_replace(' ', '-', $brantName_eng)),'brant_slug_hin'=>strtolower(str_replace(' ', '-', $brantName_hin)),'brant_image'=>$location]);

           if($ins == true){

            $notification = array(

            'message' => 'Brand Add Sussfully',
            'type' => 'success',

           );

           return redirect()->route('all.brand')->with($notification);


           }else{

            $notification = array(

            'message' => 'Something Wrong Try Again',
            'type' => 'success',

           );

           return redirect()->route('all.brand')->with($notification);

           }



           
    }


    public function BrandEdate($id){


        $brandId =  $id;

        $dat = Brand::find($brandId);
      

        return view('backend.brand.brand_edt',compact('dat'));



    }

    public function BrandUpd(Request $request,$id){

       
       $eng =  $request->input('brant_en');
       $hin =  $request->input('brant_hin');

        $new_img =  $request->file('brant_image');
      
       $old =  $request->input('oldimage');

       if($new_img == ''){



         $goto =  Brand::where('id',$id)->update(['brant_en'=>$eng,'brant_hin'=>$hin, 'brant_slug_en'=>strtolower(str_replace(' ', '_', $eng)), 'brant_slug_hin'=> strtolower(str_replace(' ', '_',$hin)),'brant_image'=>$old]);

      

            if($goto == true){

            $notification = [

                'message' => 'Brand Updated Sussfully',
                'type' => 'success',


            ];



            return redirect()->route('all.brand')->with($notification);

           
         }else{

             return redirect()->back();

         }






       }else{


        $uid =  hexdec(uniqid());

         $img_name = $uid .'_' .  $new_img->getClientOriginalName();

        Image::make($new_img)->resize(300,300)->save('upload/brand/'.$img_name);

        $location = 'upload/brand/'.$img_name;

        $oldimg_path = Brand::where('id',$id)->get();

         $unlnk = $oldimg_path[0]['brant_image'];

        @unlink(public_path($unlnk));

         $goto = Brand::where('id',$id)->update(['brant_en'=>$eng,'brant_hin'=>$hin, 'brant_slug_en'=>strtolower(str_replace(' ', '_', $eng)), 'brant_slug_hin'=> strtolower(str_replace(' ', '_',$hin)),'brant_image'=>$location]);

         if($goto == true){

            $notification = [

                'message' => 'Brand Updated Sussfully',
                'type' => 'success',


            ];



            return redirect()->route('all.brand')->with($notification);

         }else{

             return redirect()->back();

         }

        
       }


       


    


}


    // brand delete


    public function BrandDelete($id){

         $delet_img = Brand::where('id',$id)->get();

         $unk_img = $delet_img[0]['brant_image'];

         @unlink(public_path($unk_img));
        
        $delet = Brand::where('id',$id)->delete();

        if($delet == true){

            $notification = [

                'message' => 'Brand Delete Sussfully',
                'type' => 'danger',


            ];

            return redirect()->route('all.brand')->with($notification);
        }

    }



}
