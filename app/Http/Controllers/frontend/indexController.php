<?php

namespace App\Http\Controllers\frontend;







use Auth;


use App\Models\Brand;
use App\Models\User;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Multiimage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class indexController extends Controller
{

    public function index(){

       $categorys =  Category::orderBy('category_name_eng','ASC')->get();

       $sliders =  Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();

       $products = Product::where('status',1)->orderBy('id','DESC')->get();

       $featurePro = Product::where('featured',1)->where('status',1)->orderBy('id','DESC')->get();

       $hotdeals = Product::where('hot_deals',1)->where('status',1)->orderBy('id','DESC')->limit(2)->get();

       $specialoffers = Product::where('spacial_offer',1)->where('status',1)->orderBy('id','DESC')->get();

       $specialdeals = Product::where('spacial_deals',1)->where('status',1)->orderBy('id','DESC')->get();

       // First skip





       $skip_id = Category::skip(0)->first();

       $electricnoic_id = $skip_id->id;

       $electronic = Product::where('category_id',$electricnoic_id)->where('status',1)->orderBy('id','DESC')->get();

       // second skip

       $skip_id2 = Category::skip(1)->first();

       $second = $skip_id2->id;

       $second_show = Product::where('status',1)->where('category_id',$second)->orderBy('id','DESC')->get();


        // brand 

       $brand = Brand::skip(1)->first();

       $brand_id = $brand->id;

       $brand_product = Product::where('status',1)->where('brand_id',$brand_id)->orderBy('id','DESC')->get();


       

       

       

        return view('frontend.index',compact('categorys','sliders','products','featurePro','hotdeals','specialoffers','specialdeals','electronic','skip_id','second_show','skip_id2','brand','brand_product'));
    

    }

    public function userLogout(){
        Auth::logout();

        return redirect('/login');
    }

    public function userProfile(){

      $ids = Auth::user()->id;

    $arr = json_decode(User::where('id',$ids)->get(),true);

     $set['allData'] = $arr;

    
     

     return view('frontend.profile.user_profile',$set);





}

    public function userProfileStore(Request $request){


         $ids = $request->input('hid_id');

             $name = $request->input('name');

             $email = $request->input('email');

             $phone = $request->input('phone');


             
             $oldImage = $request->file('profile_photo_path');

             if($oldImage !=''){

        $dbOlgImg = json_decode(User::where('id',$ids)->get(),true);

        $unlinkImg = $dbOlgImg[0]['profile_photo_path'];

        @unlink(public_path('upload/user_image/'.$unlinkImg));

            $imgName = $oldImage->getClientOriginalName();

              $oldImage->move(public_path('upload/user_image'),$imgName);


            $upd = User::where('id',$ids)->update(['name'=>$name,'email'=>$email,'phone'=>$phone,'profile_photo_path'=>$imgName]);

            if($upd == true){

                $nitific = array(
                    'message' => 'Sussfully Updated',
                    'alert_type' => 'success'

                );
            }

            return redirect()->route('user.profile')->with($nitific);



            
            }else{

                $upd = User::where('id',$ids)->update(['name'=>$name,'email'=>$email,'phone'=>$phone,]);

            if($upd == true){

                $nitific = array(
                    'message' => 'Sussfully Updated',
                    'alert_type' => 'success'

                );
            }

            return redirect()->route('user.profile')->with($nitific);


            }










    }


    public function userChangePassword(){

        return view('frontend.profile.change_password');
    }

    
    public function userPassoupd(Request $request){


         $current_pass = $request->input('curpassword');
        $new_pass = $request->input('npassword');
        $confirm_pass = $request->input('cpassword');
         
         $user_id = $request->input('hid_id');

         $getUserData = json_decode(User::where('id',$user_id)->get(),true);




         $varyfiy = $getUserData[0]['password'];

         if(password_verify($current_pass, $varyfiy)){

            $brand_new = Hash::make($new_pass);

            $set_now = User::where('id',$user_id)->update(['password'=>$brand_new]);

            if($set_now == true){
                Auth::logout();
                return redirect('/login');


            }


           
         }else{
           return redirect()->back();
         }

         





    }



    // product details

    public function ProductDetails($id){

        $product = Product::find($id);
         $multiimgs = Multiimage::where('product_id',$id)->get();

         $clr_eng = explode(',', $product->product_color_eng);
         $size_eng = explode(',', $product->product_sige_eng);

          $pro_cat = $product->category_id;
        
         
         $related_products = Product::where('category_id',$pro_cat)->orderBy('id','DESC')->get();

         $hotdeals = Product::orderBy('id','DESC')->where('discount_price', "!=" ,null)->get();



        return view('frontend.product.product_details',compact('product','multiimgs','clr_eng','size_eng','related_products','hotdeals'));



       


    }


    public function Tagproduct($tag){

        $tagProduct = Product::where('status',1)->where('product_tags_eng',$tag)->orderBy('id','DESC')->paginate(2);

        $color = Product::groupBy('product_color_eng')->select('product_color_eng')->get();


        return view('frontend.tag.tag_view',compact('tagProduct','color'));
    }

    public function SubCategoryProduct($slug,$id){

       


                $products =  Product::where('subcategory_id',$id)->orderBy('id','DESC')->paginate(2);

        $categorys = Category::orderBy('category_name_eng','ASC')->get();

        $color = Product::groupBy('product_color_eng')->select('product_color_eng')->get();

        return view('frontend.product.subcategory_view',compact('products','categorys','color'));


        
    }


public function subsubcategoryProduct($slug,$id){

    $categorys = Category::orderBy('category_name_eng','ASC')->get();

    $subsusprods = Product::orderBy('id','DESC')->where('subsubcategory_id',$id)->paginate(2);

    $tags = Product::groupBy('product_tags_eng')->select('product_tags_eng')->orderBy('product_tags_eng','ASC')->get();

    return view('frontend/product/subsubcategory_view',compact('categorys','subsusprods','tags'));


}


public function ProductViewAjax($id){

    $pro_dtls = Product::with('brand','category')->findOrFail($id);

    $clr = explode(',', $pro_dtls->product_color_eng);
    $siz = explode(',', $pro_dtls->product_sige_eng);


    return response()->json(array(
        'product' => $pro_dtls,
        'color' => $clr,
        'size' => $siz,
    ));



}






    
}
