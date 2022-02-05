<?php

namespace App\Http\Controllers\Backend;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;

use Image;

use Carbon\Carbon;

class SliderController extends Controller
{
    public function ShowSlider(){

        $slider = Slider::latest()->get();

        return view('backend.slider.slider_view',compact('slider'));
    }


    public function SliderStore(Request $request){

        $request->validate([

            'title' => 'required',
            'slider_description' => 'required',
            'slider_img' => 'required',


        ],[

            'title.required' =>'Title Fiend Is Required',
            'slider_description.required' =>'Description Fiend Is Required',
            'slider_img.required' =>'Image Fiend Is Required',

        ]);

        $title = $request->input('title');
        $desc = $request->input('slider_description');
        $img = $request->file('slider_img');

         $newName = hexdec(uniqid())."_".$img->getClientOriginalName();

         Image::make($img)->resize(917,1000)->save('upload/slider/'.$newName);

         $location = 'upload/slider/'.$newName;

         $ins = Slider::insert([

            'slider_img'=>$location,
            'title'=>$title,
            'description'=>$desc,
            'created_at'=>Carbon::now(),


         ]);

         if($ins){

            $notification = [
                'message' => 'Slider Added Sussfully',
                'type' => 'success',

            ];

            return redirect()->back()->with($notification);
         }





    }

    public function SliderEdt($id){

        $slider = Slider::find($id);

        return view('backend.slider.slider_edt',compact('slider'));



    }

    public function SliderUpdate(Request $request,$id){

        $slider = Slider::find($id);




        $title = $request->input('title');
        $desc = $request->input('slider_description');
        $img = $request->file('slider_img');

        if($img != ''){

            $unk =  @unlink($slider['slider_img']);

                    $newName = hexdec(uniqid())."_".$img->getClientOriginalName();

         Image::make($img)->resize(917,1000)->save('upload/slider/'.$newName);

         $location = 'upload/slider/'.$newName;

         $upd = Slider::where('id',$id)->update([

            'slider_img'=>$location,
            'title'=>$title,
            'description'=>$desc,
            'updated_at'=>Carbon::now(),


         ]);

            if($upd == true){

                if($unk == true){

                    $notification = [
                'message' => 'Slider Updated Sussfully',
                'type' => 'success',

            ];

                    return redirect()->route('manage.slider')->with($notification);

                }




            }



        }




       


        

        

         

         $upd = Slider::where('id',$id)->update([

           
            'title'=>$title,
            'description'=>$desc,
            'updated_at'=>Carbon::now(),


         ]);

            if($upd == true){

                  $notification = [
                'message' => 'Slider Updated Sussfully',
                'type' => 'success',

            ];

                    return redirect()->route('manage.slider')->with($notification);

                


            }







    }

    public function DeleteSlider($id){

        $slider = Slider::find($id);

        @unlink($slider['slider_img']);

        $dlt = Slider::where('id',$id)->delete();

        if($dlt){

            $notification = [

                'message' => 'Slider Deleted Sussfully',

                'type' => 'danger'
            ];

            return redirect()->back()->with($notification);
        }


    }



    public function SliderInactive($id){


        $stt = Slider::where('id',$id)->update(['status' => 0,]);

        if($stt){

            $notification = [
                'messages'=>'Slider InACtive Sussfully',
        

                'type' => 'danger',
        ];

            return redirect()->back()->with($notification);
        }



    }

    public function SliderActive($id){

         $stt = Slider::where('id',$id)->update(['status' => 1,]);

        if($stt){

            $notification = [
                'messages'=>'Slider ACtive Sussfully',
        

                'type' => 'success',
        ];

            return redirect()->back()->with($notification);
        }


    }



}
