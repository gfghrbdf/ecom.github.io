<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use App\Models\Category;

use App\Models\subcategory;
use App\Models\subsubcategory;
use App\Models\Product;

use App\Models\Multiimage;




use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Image;


class ProductController extends Controller
{
    public function AddProduct(){

        $brand = Brand::latest()->get();

        $category = Category::latest()->get();
        $brand = Brand::latest()->get();

        return view('backend.product.product_add',compact('category','brand'));
    }


    public function getAjax($id){

        $subcat = subcategory::where('category_id',$id)->get();

        return json_encode($subcat);


    }

    public function getsubAjax($id){

    $subsubcat = subsubcategory::where('subcategory_id',$id)->get();

    return json_encode($subsubcat);



    }


    // store product

    public function StoreProduct(Request $request){

          $brand = $request->input('brand_pro');

          $cat_id = $request->input('category_pro');
          $sub_cat_id = $request->input('sub_category');
          $sub_sub_id = $request->input('sub_sub_category');
          
          $prod_name_eng = $request->input('product_name_eng');
          $prod_name_hin = $request->input('product_name_hindi');
          $pro_code = $request->input('product_code');
          $pro_qnty = $request->input('product_qty');
        
          $pro_tag_eng = $request->input('product_tags_eng');
          $pro_tag_hin = $request->input('product_tags_hin');
          $pro_size_eng = $request->input('product_size_eng');
          $pro_size_hin = $request->input('product_size_hin');
          $pro_color_eng = $request->input('product_color_eng');
          $pro_color_hin = $request->input('product_color_hin');
          
          $pro_price = $request->input('product_seeling_price');
          $pro_dis_price = $request->input('product_discount_price');
          $pro_thumb_img = $request->file('product_image_thumb');
          
          $sht_des_eng = $request->input('short_des_eng');
          $sht_des_hin = $request->input('short_des_hin');
          $long_des_eng = $request->input('long_description_eng');
          $long_des_hin = $request->input('long_description_hin');

           $hot_del = $request->input('hot_deals') ;
            $featur = $request->input('featured') ;
            $spc_offer = $request->input('special_offer') ;
            $deals = $request->input('special_deals');



             $img_name =  hexdec(uniqid())."_".$pro_thumb_img->getClientOriginalName();




            Image::make($pro_thumb_img)->resize(917,1000)->save('upload/product/thamblim/'.$img_name);

            $location = 'upload/product/thamblim/'.$img_name;
         
         


          $pro_id = Product::insertGetId([

            'brand_id' => $brand,
            'category_id' => $cat_id,
            'subcategory_id' => $sub_cat_id,
            'subsubcategory_id' => $sub_sub_id,
            'product_name_eng' => $prod_name_eng,
            'product_name_hin' => $prod_name_hin,
            
            'product_slug_eng' =>strtolower(str_replace(' ','_',$prod_name_eng  )),
            'product_slug_hin' => strtolower(str_replace(' ','_',$prod_name_hin  )),
            
            'product_code' => $pro_code,
            'product_qty' => $pro_qnty,
            'product_tags_eng' => $pro_tag_eng,
            'product_tags_hin' => $pro_tag_hin,
            'product_sige_eng' => $pro_size_eng,

            'product_sige_hin' => $pro_size_hin,
            'product_color_eng' => $pro_color_eng,
            'product_color_hin' => $pro_color_hin,
            'seeling_price' => $pro_price,
            'discount_price' => $pro_dis_price,

            'short_descrip_eng' => $sht_des_eng,
            'short_descrip_hin' => $sht_des_hin,
            'long_descrip_eng' => $long_des_eng,
            'long_descrip_hin' => $long_des_hin,
            'product_thumbnail' => $location,

            'hot_deals' => $hot_del,
            'featured' => $featur,
            'spacial_offer' => $spc_offer,
            'spacial_deals' => $deals,
            'status' => 1,
            'created_at' => Carbon::now(),
            

          ]);

      


          $multi_Image = $request->file('multi_img');

          foreach($multi_Image as $img){

            $muntu_name = hexdec(uniqid()).$img->getClientOriginalName();

            Image::make($img)->resize(917,1000)->save('upload/product/multi-img/'.$muntu_name);

            $multi_save = 'upload/product/multi-img/'.$muntu_name;

    


            $ins = Multiimage::insert([

                'product_id'=> $pro_id,

                'photo_name' => $multi_save,

                'created_at' => Carbon::now(),

            ]);

            $notification = [

                'message' => 'Product Insert Sussfully',

                'type' => 'success',
            ];




            






          }

          if($ins == true){

                return redirect()->route('manage-product')->with($notification);


            }




    }


// see all product


    public function ManageProduct(){

        $allPro = Product::latest()->get();

        return view('backend.product.product_view',compact('allPro'));




    }

    public function EditProduct($id){

     $all_product = Product::find($id);
     $brand = Brand::latest()->get();
     $category = Category::latest()->get();
     $subcategory = subcategory::latest()->get();
     $subsubcategory = subsubcategory::latest()->get();

     $multi = Multiimage::where('product_id',$id)->get();

     return view('backend.product.product_edt',compact('all_product','brand','category','subcategory','subsubcategory','multi'));










    }


    public function ProductUpdate(Request $request,$id){


        $brand = $request->input('brand_pro');

          $cat_id = $request->input('category_pro');
          $sub_cat_id = $request->input('sub_category');
          $sub_sub_id = $request->input('sub_sub_category');
          
          $prod_name_eng = $request->input('product_name_eng');
          $prod_name_hin = $request->input('product_name_hindi');
          $pro_code = $request->input('product_code');
          $pro_qnty = $request->input('product_qty');
        
          $pro_tag_eng = $request->input('product_tags_eng');
          $pro_tag_hin = $request->input('product_tags_hin');
          $pro_size_eng = $request->input('product_size_eng');
          $pro_size_hin = $request->input('product_size_hin');
          $pro_color_eng = $request->input('product_color_eng');
          $pro_color_hin = $request->input('product_color_hin');
          
          $pro_price = $request->input('product_seeling_price');
          $pro_dis_price = $request->input('product_discount_price');
         
          
          $sht_des_eng = $request->input('short_des_eng');
          $sht_des_hin = $request->input('short_des_hin');
          $long_des_eng = $request->input('long_description_eng');
          $long_des_hin = $request->input('long_description_hin');

           $hot_del = $request->input('hot_deals') ;
            $featur = $request->input('featured') ;
            $spc_offer = $request->input('special_offer') ;
            $deals = $request->input('special_deals');

        $pro_upd = Product::find($id)->update([

            'brand_id' => $brand,
            'category_id' => $cat_id,
            'subcategory_id' => $sub_cat_id,
            'subsubcategory_id' => $sub_sub_id,
            'product_name_eng' => $prod_name_eng,
            'product_name_hin' => $prod_name_hin,
            
            'product_slug_eng' =>strtolower(str_replace(' ','_',$prod_name_eng  )),
            'product_slug_hin' => strtolower(str_replace(' ','_',$prod_name_hin  )),
            
            'product_code' => $pro_code,
            'product_qty' => $pro_qnty,
            'product_tags_eng' => $pro_tag_eng,
            'product_tags_hin' => $pro_tag_hin,
            'product_sige_eng' => $pro_size_eng,

            'product_sige_hin' => $pro_size_hin,
            'product_color_eng' => $pro_color_eng,
            'product_color_hin' => $pro_color_hin,
            'seeling_price' => $pro_price,
            'discount_price' => $pro_dis_price,

            'short_descrip_eng' => $sht_des_eng,
            'short_descrip_hin' => $sht_des_hin,
            'long_descrip_eng' => $long_des_eng,
            'long_descrip_hin' => $long_des_hin,
            

            'hot_deals' => $hot_del,
            'featured' => $featur,
            'spacial_offer' => $spc_offer,
            'spacial_deals' => $deals,
            'status' => 1,
            'updated_at' => Carbon::now(),
            

          ]);

        if($pro_upd  == true){

            $notification = [

                'message' => 'Product Deleted Without Image',
                'type' => 'danger'

            ];




            return redirect()->route('manage-product')->with($notification);
        }







    }


    public function MultiImageUpd(Request $request){

        $img = $request->multi_img;

        
        foreach ( $img as $key => $dataimg ){


            $muntu_name = hexdec(uniqid()).$dataimg->getClientOriginalName();

            Image::make($dataimg)->resize(917,1000)->save('upload/product/multi-img/'.$muntu_name);

            $multi_save = 'upload/product/multi-img/'.$muntu_name;

            $prv_img = Multiimage::where('id',$key)->get();

            foreach ($prv_img as $remv){

                @unlink($remv['photo_name']);

            }




            $multi = Multiimage::where('id',$key)->update(['photo_name'=>$multi_save]);








            
        }

        if($multi == true){

            $notification = [
                'message' => 'Multiple Image Updated',
                'type' => 'success', 
            ];

            return redirect()->back()->with($notification);
        }


        





    }


    public function UploadMoreImg(Request $request,$id){

        $more = $request->file('upd_img');

        foreach ($more as  $value) {

            $newName = hexdec(uniqid()).'_'.$value->getClientOriginalName();

            image::make($value)->resize(917,1000)->save('upload/product/multi-img/'.$newName);

            $location = 'upload/product/multi-img/'.$newName;

            $ins = Multiimage::insert([

                'product_id' => $id,
                'photo_name' => $location,
                'created_at' => Carbon::now(),


            ]);

            

            
        }


        if($ins == true){

                $notification = [
                    'messages'=>'Image Insert Sussfully',

                    'type' => 'success',
            ];

                return redirect()->back()->with($notification);
            }

        


    }




    public function multiImgDelete($id){



        // $delete = Multiimage::where('id',$id)->delete();

        $unlinl = Multiimage::find($id);

       $unk =  @unlink($unlinl['photo_name']);

       if($unk == true){

        $delete =  Multiimage::where('id',$id)->delete();

        if($delete == true){

             return redirect()->back();


        }


       }

        

       

    



    }

    

    public function thumbnUpd(Request $request,$id){

        $img = $request->file('product_image');

 $newName = hexdec($img)."_".$img->getClientOriginalName();

Image::make($img)->resize(917,1000)->save('upload/product/multi-img/'.$newName);

    $location = 'upload/product/multi-img/'.$newName;

   $upd =  Product::where('id',$id)->update([

        'product_thumbnail'=>$location,
    ]);

   if($upd){
    return redirect()->back();
   }






}


    // delete product

    public function DeleteProduct($id){

       

        $multiImg = Multiimage::where('product_id',$id)->get();

        foreach($multiImg as $data){

            @unlink($data['photo_name']);


        }

         $getImg = Product::find($id);

        @unlink($getImg['product_thumbnail']);

        $dlt = Product::where('id',$id)->delete();

        if($dlt == true){

            $notification = [

                'message' => 'Product Delete Sussfully',

                'type' => 'danger',
            ];

            return redirect()->back()->with($notification);
        }



}


    public function InActive($id){

        $inact = Product::where('id',$id)->update(['status'=>0]);

        if($inact){
            $notification = [

                'message' => 'Product InActive Sussfully',
                'type' => 'danger',


            ];
            return redirect()->back()->with($notification);
        }


        
    }


    public function Active($id){


        $inact = Product::where('id',$id)->update(['status'=>1]);

        if($inact){
            $notification = [

                'message' => 'Product Active Sussfully',
                'type' => 'success',


            ];
            return redirect()->back()->with($notification);
        }



        
    }







}
