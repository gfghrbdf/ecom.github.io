<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;



use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function AdminProfile(){

        $admindata = json_decode(Admin::get(),true);

        $dat['data'] = $admindata;

        return view('admin.admin_profile_view',$dat);

    }

    public function AdminProfileEdit(){

        $editdata = json_decode(Admin::get(),true);

        $dat['data'] = $editdata;

        return view('admin.admin_profile_edit',$dat);


    }


    public function AdminProfileStore(Request $request){

     $id = $request->input('hide_id');

       $emaill = $request->input('email');

        $namel = $request->input('name');

        $file = $request->file('profile_photo_path');

        $img_get = Admin::where('id',$id)->get();

        $old_path =  $img_get[0]['profile_photo_path'];



        if($file !=''){


        $fileName = $file->getClientOriginalName();

        $file->move(public_path('upload/admin_image'),$fileName);

        @unlink(public_path('upload/admin_image/'.$old_path));

        $upd = Admin::where('id',$id)->update(['name'=>$namel,'email'=>$emaill,'profile_photo_path'=>$fileName]);

        if($upd == true){

            $notification = array(

                'message'=>'Sussfully Updated',
                'alert-type'=>'success'

            );

            return redirect()->route('admin.profile')->with($notification);
        }else{

          


            return redirect()->route('admin.profile.edit');
        }



        }else{

             $upd = Admin::where('id',$id)->update(['name'=>$namel,'email'=>$emaill]);

              if($upd == true){

                 $notification = array(

                'message'=>'Sussfully Updated',
                'alert-type'=>'success'

            );

              

           


            return redirect()->route('admin.profile')->with($notification);
        }else{

         


            return redirect()->route('admin.profile.edit');
        }


           
        }





    }






    // password update


    public function AdminChangePassword(){

         $geto['data'] =  Admin::all();


        return view('admin.admin_change_password',$geto);
    }

    public function AdminUpdateChangePassword(Request $request){

        
        $checkPasss = $request->input('oldpassword');
         $newPass = $request->input('password');

    

         $ids = $request->input('hid_id');


        $geto =  Admin::all();

       $oldPass = $geto[0]['password'];

    

     

       if(password_verify($checkPasss,$oldPass)){

        echo "true";

        $hash_pass = hash::make($newPass); 

        Admin::where('id',$ids)->update(['password'=>$hash_pass]);

        Auth::logout();

        return redirect()->route('admin.logout');

       }else{

        return redirect()->back();

       }

    }



    // password update end






}
