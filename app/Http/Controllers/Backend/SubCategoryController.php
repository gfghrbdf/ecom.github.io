<?php

namespace App\Http\Controllers\Backend;




use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\subcategory;
use App\Models\Category;

// sub category model

use App\Models\subsubcategory;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){

        $allCategories = Category::orderBy('category_name_eng','ASC')->get();



        $allSubCat = subcategory::latest()->get();

        return view('backend.category.subcategory_view',compact('allSubCat','allCategories'));


    }


    public function SubCategoryStore(Request $request){

        $request->validate([

            'category'=> 'required',
             'subcategory_eng'=> 'required',
              'subcategory_hin'=> 'required',

        ]);

        $cat_id = $request->input('category');
        $subcat_eng = $request->input('subcategory_eng');

        $subcat_hin = $request->input('subcategory_hin');


        $insrt = subcategory::insert(['category_id'=>$cat_id,'sub_category_eng'=>$subcat_eng,'sub_category_hin'=>$subcat_hin,'sub_category_eng_slug'=>strtolower(str_replace(' ','_',$subcat_eng)),'sub_category_hin_slug'=>strtolower(str_replace(' ','_',$subcat_hin))]);


        if($insrt == true){

            $notification = array(

                'message' => 'Sub Category Insert Sussfully',
                'type' => 'success',


            );


            return redirect()->route('view.subcategory')->with($notification);


        }




        
        




    }



    public function subCategoryEdt($id){

        $allCategories = Category::orderBy('category_name_eng','ASC')->get();

        $datas = subcategory::find($id);

        return view('backend.category.subcategory_edt',compact('datas','allCategories'));

    }

    public function subCategoryUpdate(Request $request,$id){

         $cat_id = $request->input('category');
        $subcat_eng = $request->input('subcategory_eng');

        $subcat_hin = $request->input('subcategory_hin');

        $upd = subcategory::where('id',$id)->update(['category_id'=>$cat_id,'sub_category_eng'=>$subcat_eng,'sub_category_hin'=>$subcat_hin,'sub_category_eng_slug'=>strtolower(str_replace(' ','_',$subcat_eng)),'sub_category_hin_slug'=>strtolower(str_replace(' ','_',$subcat_hin))]);


        if($upd == true){

            $notification = array(

                'message' => 'Sub Category Updated Sussfully',
                'type' => 'success',


            );

            return redirect()->route('view.subcategory');



    }








}


public function subCategoryDelete($id){

    $delete = subcategory::where('id',$id)->delete();

    if($delete == true){

        $notification = array(

                'message' => 'Sub Category Delete Sussfully',
                'type' => 'danger',


            );

            return redirect()->back()->with($notification);



    }


}



// sub sub category Portotion /////////////////////////////




    public function SubSubCategoryView(){



    $allCategories = Category::orderBy('category_name_eng','ASC')->get();

  

    $allsubsubcategory = subsubcategory::latest()->get();






        return view('backend.category.subsubcategory',compact('allCategories','allsubsubcategory'));
    }



    public function subcatajax($id){

        

        $subCat = subcategory::where('category_id',$id)->orderBy('sub_category_eng','ASC')->get();

        return  json_encode($subCat);


    }


    
    // sub sub insert

    public function subsubStore(Request $request){

        $request->validate([

            'category_id' =>'required',
            'subcategory' =>'required',
            'subsubcategory_eng' =>'required',

            'subsubcategory_hin' =>'required',
            


        ],[

            'category_id.required' =>'Category Filed Required',
            'subcategory.required' =>'SubCategory Filed Required',
            'subsubcategory_eng' =>'Sub-Sub-Category Eng Filed Required',

            'subsubcategory_hin' =>'Sub-Sub-Category Hin Filed Required',


        ]);



         $Cat = $request->input('category_id');

         $subCat = $request->input('subcategory');

          $subsub_eng = $request->input('subsubcategory_eng');

          $subsub_hin = $request->input('subsubcategory_hin');


         $insert = subsubcategory::insert(['category_id'=>$Cat,'subcategory_id'=>$subCat,'subsubcategory_eng'=>$subsub_eng,'subsubcategory_hin'=>$subsub_hin,'subsubcategory_slug_eng'=>strtolower(str_replace(' ','_',$subsub_eng)),'subsubcategory_slug_hin'=>strtolower(str_replace(' ','_',$subsub_hin))]);

         if($insert == true){

            $notification = array(

                'message' => 'Sub Sub Category Insert Sussfully',
                'type' => 'success',

            );

            return redirect()->route('all.subsubcategory')->with($notification);


         }





    }

    // sub sub cat edt


    public function subsubEdt($id){

         $allSubCategories = subcategory::orderBy('sub_category_eng','ASC')->get();

        

        $allCategories = Category::orderBy('category_name_eng','ASC')->get();



        $subsubEdtData = subsubcategory::find($id); 

        return view('backend.category.subsubcategory_edt',compact('subsubEdtData','allCategories','allSubCategories'));



    }

public function subsubUpd(Request $request,$id){

             $Cat = $request->input('category_id');

         $subCat = $request->input('subcategory');

          $subsub_eng = $request->input('subsubcategory_eng');

          $subsub_hin = $request->input('subsubcategory_hin');


          $upd = subsubcategory::where('id',$id)->update(['category_id'=>$Cat,'subcategory_id'=>$subCat,'subsubcategory_eng'=>$subsub_eng,'subsubcategory_hin'=>$subsub_hin,'subsubcategory_slug_eng'=>strtolower(str_replace(' ','_',$subsub_eng)),'subsubcategory_slug_hin'=>strtolower(str_replace(' ','_',$subsub_hin))]);

          if($upd == true){

            $notification = array(

                'message'=>'Sub Sub Category Updated Sussfully',
                'type'=>'success',

            );

            return redirect()->route('all.subsubcategory')->with($notification);
          }







}

    public function subsubDelete($id){

        $dlt = subsubcategory::where('id',$id)->delete();


         if($dlt == true){

            $notification = array(

                'message'=>'Sub Sub Category Deleted Sussfully',
                'type'=>'danger',

            );

            return redirect()->back()->with($notification);
          }


    }







}
