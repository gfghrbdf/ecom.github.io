<?php

    
// admin Controlle

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\Backend\AdminProfileController;

use App\Http\Controllers\Backend\brandController;

use App\Http\Controllers\Backend\CategoryController;

use App\Http\Controllers\Backend\SubCategoryController;


// product
    
    use App\Http\Controllers\Backend\ProductController;

// end product

// slider

use App\Http\Controllers\Backend\SliderController;

// slider end

// cupon

use App\Http\Controllers\Backend\Cuponcontroller;
// shipping
use App\Http\Controllers\backend\ShippingController;

// frontend  controller

use App\Http\Controllers\frontend\indexController;

use App\Http\Controllers\frontend\LanguageController;

// cart controller

use App\Http\Controllers\frontend\CartController;

use App\Http\Controllers\user\wiselistCont;

use App\Http\Controllers\user\cartPage;

// check controller
use App\Http\Controllers\user\CheckController;
    
    // Stripe controller

use App\Http\Controllers\user\StripeController;

 // cash controller
use App\Http\Controllers\user\Cashcontroller;

// show user order
use App\Http\Controllers\user\AllUser;

// admin order
use App\Http\Controllers\Backend\OrderController;













/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){

    Route::get('/login',[AdminController::class,'loginForm']);

    Route::post('/login',[AdminController::class,'store'])->name('admin.login');


});

Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/profile/edit',[AdminProfileController::class,'AdminProfileEdit'])->name('admin.profile.edit');

// update data



Route::post('/admin/profile/store',[AdminProfileController::class,'AdminProfileStore'])->name('admin.profile.store');


// end update


// password



Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/change/password',[AdminProfileController::class,'AdminChangePassword'])->name('admin.change.password');




Route::post('update/change/password',[AdminProfileController::class,'AdminUpdateChangePassword'])->name('update.change.password');


// end password



// brand.store


Route::prefix('brand')->group(function(){

    Route::get('/view',[brandController::class,'BrandView'])->name('all.brand');

    Route::post('/store',[brandController::class,'BrandStore'])->name('brand.store');

    Route::get('/edate/{id}',[brandController::class,'BrandEdate'])->name('brand.edate');

    Route::post('/update/{id}',[brandController::class,'BrandUpd'])->name('brand.update');

 

     Route::get('/delete/{id}',[brandController::class,'BrandDelete'])->name('brand.delete');


    



});


// category


    Route::prefix('category')->group(function(){

        

        

    Route::get('/view',[CategoryController::class,'CategoryView'])->name('view.category');

     Route::post('/store',[CategoryController::class,'CategoryStore'])->name('category.store');


     Route::get('/edate/{id}',[CategoryController::class,'CategoryEdate'])->name('category.edate');


     Route::post('update/{id}',[CategoryController::class,'CategoryUpd'])->name('category.upd');

      Route::get('/delete/{id}',[CategoryController::class,'CategoryDelete'])->name('category.delete');




      // end category


// start sub category

 

    Route::get('/sub/view',[SubCategoryController::class,'SubCategoryView'])->name('view.subcategory');


    Route::post('/sub/store',[SubCategoryController::class,'SubCategoryStore'])->name('subcategory.store');

   

    Route::get('/sub/edate/{id}',[SubCategoryController::class,'subCategoryEdt'])->name('subcategory.edate');

 

    Route::post('/sub/update/{id}',[SubCategoryController::class,'subCategoryUpdate'])->name('subcategory.update');

    // subcategory.delete

    Route::get('/sub/delete/{id}',[SubCategoryController::class,'subCategoryDelete'])->name('subcategory.delete');






// end sub category


    // sub sub category


    

Route::get('/sub/sub/view',[SubCategoryController::class,'SubSubCategoryView'])->name('all.subsubcategory');


Route::post('/subsub/store',[SubCategoryController::class,'subsubStore'])->name('subsub.sotre');



Route::get('subsubcategory/edt/{id}',[SubCategoryController::class,'subsubEdt'])->name('subsubcategory.edt');



Route::get('subcategory/ajax/{id}',[SubCategoryController::class,'subcatajax']);

    Route::post('subsubcategory/update/{id}',[SubCategoryController::class,'subsubUpd'])->name('subsub.update');

   

    Route::get('subsubcategory/delete/{id}',[SubCategoryController::class,'subsubDelete'])->name('subsubcategory.delete');




    // end sub sub categoy





    });


  

   



    


// end category




    // admin Product start


  

   


    Route::prefix('product')->group(function(){

    Route::get('/add',[ProductController::class,'AddProduct'])->name('add-product');

    Route::get('/getCat/ajax/{id}',[ProductController::class,'getAjax']);

     Route::get('/subCat/ajaxs/{id}',[ProductController::class,'getsubAjax']);

     // Route::post('/store',[ProductController::class,'ProductStore'])->name('product.store');


         Route::post('store',[ProductController::class,'StoreProduct'])->name('product-store');

   

Route::get('/manage',[ProductController::class,'ManageProduct'])->name('manage-product');

// proedt

Route::get('/edate/{id}',[ProductController::class,'EditProduct'])->name('product-edt');

// update


Route::post('/Update/{id}',[ProductController::class,'ProductUpdate'])->name('product-upd');


// multi image update

Route::post('/image/update',[ProductController::class,'MultiImageUpd'])->name('update-pro-image');


Route::get('image/delete/{id}',[ProductController::class,'multiImgDelete'])->name('multiimg-delete');

Route::post('/more-upload/img/{id}',[ProductController::class,'UploadMoreImg'])->name('multiimg-upload');


Route::post('/thumbn-upd/img/{id}',[ProductController::class,'thumbnUpd'])->name('upload-thumb');


// product delete

Route::get('/delete/{id}',[ProductController::class,'DeleteProduct'])->name('delete-product');

Route::get('/inactive/{id}',[ProductController::class,'InActive'])->name('product.inactive');

Route::get('/active/{id}',[ProductController::class,'Active'])->name('product.active');





    });


    


    // end admin product


    // add slider

    
Route::middleware(['auth:admin'])->group(function(){

        Route::prefix('slider')->group(function(){

Route::get('/show/slider',[SliderController::class,'ShowSlider'])->name('manage.slider');

    Route::post('/store',[SliderController::class,'SliderStore'])->name('slider.store');

    Route::get('/edit/{id}',[SliderController::class,'SliderEdt'])->name('slider.edate');

    Route::post('/update/{id}',[SliderController::class,'SliderUpdate'])->name('slider.upd');

    Route::get('/delete/{id}',[SliderController::class,'DeleteSlider'])->name('slider.delete');

    Route::get('slider/inactive/{id}',[SliderController::class,'SliderInactive'])->name('slider.inactive');

    Route::get('slider/active/{id}',[SliderController::class,'SliderActive'])->name('slider.active');


    });

});






    // end slider


    // cupon

Route::prefix('cupon')->group(function(){

    Route::get('/view',[Cuponcontroller::class,'CuponView'])->name('cupon.show');
    Route::post('/store',[Cuponcontroller::class,'CuponStore'])->name('cupon.store');
    Route::get('/update/{id}',[Cuponcontroller::class,'CuponUpdate']);
    Route::post('/edate',[Cuponcontroller::class,'CuponEdate'])->name('cupon.edate');
    
    Route::get('/delete/{id}',[Cuponcontroller::class,'CuponDelete']);


    


});



Route::prefix('shipping')->group(function(){

    Route::get('/view',[ShippingController::class,'ShippingView'])->name('division-show');
    Route::post('/store',[ShippingController::class,'ShippingStore'])->name('shipping.store');
     Route::get('/update/{id}',[ShippingController::class,'ShippingUpdate']);
      Route::post('/edate',[ShippingController::class,'ShippingEdate'])->name('shipping.edate');
          Route::get('/delete/{id}',[ShippingController::class,'ShippingDelete']);

          // district

    Route::get('/district-view',[ShippingController::class,'DistrictView'])->name('district-show');

    Route::post('/district-store',[ShippingController::class,'districtStore'])->name('district.store');

     Route::get('/district-delete/{id}',[ShippingController::class,'districtDelete']);

     Route::get('/district-update/{id}',[ShippingController::class,'districtUpdate']);

     Route::post('/district-edate',[ShippingController::class,'districtEdate'])->name('district.edate');





    // Ship State

    Route::get('/state-view',[ShippingController::class,'stateView'])->name('state-show');

    Route::post('/state-store',[ShippingController::class,'stateStore'])->name('state.store');

    Route::get('/state-delete/{id}',[ShippingController::class,'stateDelete']);
     Route::get('/state-district/{id}',[ShippingController::class,'getDistrtict']);

     Route::get('/state-state/{id}',[ShippingController::class,'getState']);


     Route::get('/state-update/{id}',[ShippingController::class,'StateUpdate']);

    Route::post('/state-edate',[ShippingController::class,'stateEdate'])->name('state.edate');





});


// Cuponcontroller




// orders

Route::prefix('order')->group(function(){

Route::get('/state-update',[OrderController::class,'Pandingorder']);





});




// cupon Apply

Route::post('/cupon-check',[CartController::class,'CuponCheck']);

Route::get('/cupon-get',[CartController::class,'CuponGet']);

Route::get('/cupon-remove',[CartController::class,'CuponRemove']);

// checkout Route

Route::get('/checkout',[CartController::class,'ChecKoutCreate'])->name('checkout');


Route::post('/checkout/store',[CheckController::class,'CheckoutStore'])->name('checkout.store')->middleware('wist');




// admin end





// frontend route


Route::get('/',[indexController::class,'index']);

// user.logout

Route::get('/user/logout',[indexController::class,'userLogout'])->name('user.logout');

Route::middleware(['auth:sanctum,web', 'verified'])->get('/user/profile',[indexController::class,'userProfile'])->name('user.profile');




Route::post('/user/profile/store',[indexController::class,'userProfileStore'])->name('user.profile.store');


Route::post('/user/profile/password',[indexController::class,'userPassoupd'])->name('user.profile.password');

// munna

Route::get('/user/my/order',[AllUser::class,'MyOrder'])->name('user.order');

Route::get('/user/order_details/{id}',[AllUser::class,'OrderDetails']);

// invoice


Route::get('/user/invoice_download/{id}',[AllUser::class,'OrderInvoice']);






Route::middleware(['auth:sanctum,web', 'verified'])->get('user/change/password',[indexController::class,'userChangePassword'])->name('change.password');









// end frontend route




Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard')->middleware('auth:admin');




Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// frontend show




Route::get('/language/english',[LanguageController::class,'english'])->name('language.english');

Route::get('/language/hindi',[LanguageController::class,'hindi'])->name('language.hindi');

Route::get('product/details/{id}',[indexController::class,'ProductDetails']);

Route::get('product/tag/{id}',[indexController::class,'Tagproduct']);


// category wise product

Route::get('/subcategory/product/{slug}/{id}',[indexController::class,'SubCategoryProduct']);

Route::get('/subsubcategory/product/{slug}/{id}',[indexController::class,'subsubcategoryProduct']);

Route::get('/product/view/modal/{id}',[indexController::class,'ProductViewAjax']);

// end front end show

// cart



Route::post('/cart/data/store/{id}',[CartController::class,'cto']);


// show on minicart

Route::get('product/mini/cart',[CartController::class,'MiniCart']);

// remove cart

Route::get('product/cart/remove/{id}',[CartController::class,'RemoveCartPro']);


// wislist





Route::get('/wisList/{id}',[wiselistCont::class,'Addtows']);

Route::get('/wisList',[wiselistCont::class,'wisListView']); 

Route::get('/wisList-data-view',[wiselistCont::class,'wistListProduct']);

Route::get('/wist/delet/{id}',[wiselistCont::class,'wistListDelete']);

Route::get('/cart',[cartPage::class,'CartView']);


Route::get('/remove/{id}',[cartPage::class,'CartDlt']);

Route::get('/cartudate/{id}',[cartPage::class,'CartIncrement']);

Route::get('/cartdec/{id}',[cartPage::class,'CartDecriment']);


// Payment




Route::post('/stripe/order',[StripeController::class,'StripeOrder'])->name('stripe.order')->middleware('wist');

// cash on delevary

Route::post('/cash/order',[Cashcontroller::class,'CashOrder'])->name('stripe.order')->middleware('wist');














