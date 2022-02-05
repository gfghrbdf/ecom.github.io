<?php

namespace App\Http\Controllers\Backend;




use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Auth;

class CategoryController extends Controller
{
    public function CategoryView(){

       $category = Category::latest()->get();

       return view('backend.category.category_view',compact('category'));

      


    }


    public function CategoryStore(Request $request){

        $request->validate([

            'category_icn' => 'required',
            'category_eng' => 'required',
            'category_hin' => 'required',

        ],[

            'category_icn.required' =>'Category Icon Field Is Required',
            'category_eng.required' => 'Category Eng Field Is Required',
            'category_hin.required' => 'Category Hindi Field Is Required',
        ]);


        $icon = $request->input('category_icn');
       $c_eng = $request->input('category_eng');
       $c_hin = $request->input('category_hin');

      
       $cat_insert = Category::insert(['category_name_eng'=>$c_eng,'category_name_hin'=>$c_hin,'category_slug_eng'=>strtolower(str_replace(' ','_',$c_eng)),'category_slug_hin'=>strtolower(str_replace(' ','_',$c_hin)),'category_icon'=>$icon]);

       
       if($cat_insert == true){

        $nitification = array(


            'message' => 'Category Add Sussfully',

            'type' => 'success',



        );

            return redirect()->route('view.category')->with($nitification);

       }else{

         $nitification = array(


            'message' => 'Something Wrong',

            'type' => 'danger',



        );

            return redirect()->route('view.category')->with($nitification);

      


       }


    }

    public function CategoryEdate($id){

        $singleCat = Category::find($id);

        return view('backend.category.category_edt',compact('singleCat'));





    

    }

    public function CategoryUpd(Request $request,$id){

        $icon = $request->input('category_icn');
       $c_eng = $request->input('category_eng');
       $c_hin = $request->input('category_hin');

       $update = Category::where('id',$id)->update(['category_name_eng'=>$c_eng,'category_name_hin'=>$c_hin,'category_slug_eng'=>strtolower(str_replace(' ','_',$c_eng)),'category_slug_hin'=>strtolower(str_replace(' ','_',$c_hin)),'category_icon'=>$icon]);

      if($update == true){

        $nitification = array(


            'message' => 'Category Update Sussfully',

            'type' => 'success',



        );



        return redirect()->route('view.category')->with($nitification);
      
      }else{


        $nitification = array(


            'message' => 'Something Wrong',

            'type' => 'danger',



        );



        return redirect()->route('view.category')->with($nitification);




      }





    }


    public function CategoryDelete($id){

        $delete = Category::where('id',$id)->delete();

        if($delete == true){

             $nitification = array(


            'message' => 'Category Delete Sussfully',

            'type' => 'danger',



        );

            return redirect()->route('view.category')->with($nitification);
       
        }else{

             $nitification = array(


            'message' => 'Something Wrong',

            'type' => 'danger',



        );

            return redirect()->route('view.category')->with($nitification);


        }



    }





}
