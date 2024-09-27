<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\AdminRegisterController;
use App\ProductCategory;
use App\ProductSubcategory;


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
/*Route::get('/', function () {
    return view('mainpages.homepage');
});
*/
//Route::get('/','HomeController@index');
Route::get('/',function(){

	if(Session::get('logged_admin')==1){
     return view('dashboard.admindashboard');

	}
	else if(Session::get('logged_user')==1){

		 $product_cat_data = ProductCategory::where('is_deleted','0')->get();
    $product_subcat_data = ProductSubcategory::where('is_deleted','0')->get();
      //print_r($product_cat_data);
    return view('mainpages.homepage',['pro_cat_data'=>$product_cat_data,'product_subcat_data'=>$product_subcat_data]);
	}
	else{
		 $product_cat_data = ProductCategory::where('is_deleted','0')->get();
    $product_subcat_data = ProductSubcategory::where('is_deleted','0')->get();
      //print_r($product_cat_data);
    return view('mainpages.homepage',['pro_cat_data'=>$product_cat_data,'product_subcat_data'=>$product_subcat_data]);
	}
});



Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');


Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/loginpage', function () {
	
    return view('auth.login');
})->name('loginpage');


Route::get('/adminregister', function () {
	
    return view('auth.admin.register');
})->name('adminregister');

Route::post('/registeradmin', 'Auth\AdminRegisterController@create')->name('registeradmin');
//Route::post('/login', [App\Http\Controllers\Auth\LoginController::class])->name('login');

/*Route::get('/','HomeController@index');*/




Route::get('/adminlogin','LoginController@login_page_show');
Route::post('/loginroute','LoginController@login_check')->name('loginroute');

Route::get('/dashboard','admindashboard@dashboard_page_show');
Route::get('/adminlogout','admindashboard@logout_func');


Route::get('/signin','signin@signin_page');
Route::get('/signup','signup@signup_page');


Route::post('/usersignuproute','signin@signup_value_insert')->name('usersignuproute');
Route::post('/usersigninroute','signup@signin_value_check')->name('usersigninroute');


Route::get('/userlogout','HomeController@logout_user_func');


Route::get('/category',function(){
$product_category_details = App\ProductCategory::where('is_deleted','0' )->get();
if(Session::has('session_user')){
    return view('dashboard.category',['product_cat_det'=>$product_category_details]);
}else{
	return redirect('/adminlogin');
}
});
Route::get('/addcategory','AddProductCategory@addcategory_page_show');



Route::get('/addcategory',function(){
return view('dashboard.addcategory');
});

// Route::get('/product',function(){
// return view('dashboard.product');
// });

Route::get('/addproducts','product_details@addproducts_page_show');



Route::get('/addproducts',function(){
	$product_cat_id=App\ProductCategory::where('is_deleted','0' )->get();
return view('dashboard.addproducts',['product_cat_id'=>$product_cat_id]);
});

Route::post('/product_submit','product_details@insertproducts_page_show')->name('productsubmit');

Route::get('/product',function(){
$products_details = App\product::where('is_deleted','0' )->get();
    return view('dashboard.product',['product_det'=>$products_details]);

});

Route::get('/productedit/{id}',function($id){

	$productdetails = App\product::where('product_id',$id )->get();
	$product_cat_id=App\ProductCategory::where('is_deleted','0' )->get();
	$product_subcat_id=App\ProductSubcategory::where('is_deleted','0' )->get();
	return view('dashboard.editproduct',['productdet'=>$productdetails,'product_cat_id'=>$product_cat_id,'product_subcat_id'=>$product_subcat_id]);
	
});

Route::post('/updatepro','product_details@updateproducts_page_show')->name('updatepro');

// Route::get('/product',function(){

// 	$productdetails = App\product::where('is_deleted','0' )->get();
// 	return view('dashboard.product',['productdet'=>$productdetails]);
	
// });

Route::get('/productdelete/{id}','product_details@products_delete_page');





Route::get('/subcategory',function(){
$product_subcategory_details = App\ProductSubcategory::where('is_deleted','0' )->get();
    return view('dashboard.subcategory',['product_subcat_det'=>$product_subcategory_details]);

});

//Route::get('/addsubcategory','productcategory_controller@addsubcategory_page_show');



Route::get('/addsubcategory',function(){
	$product_cat_id=App\ProductCategory::where('is_deleted','0' )->get();
return view('dashboard.addsubcategory',['product_cat_id'=>$product_cat_id]);
});




Route::post('/product_subcatsubmit','productcategory_controller@insertsubcatname_page_show')->name('productsubcatsubmit');
//Route::get('/subcategory','productcategory_controller@addsubcategory_page_show');




Route::post('/product_catsubmit','AddProductCategory@insertcatname_page_show')->name('productcatsubmit');


//Route::get('/subcategory','productcategory_controller@addsubcategory_page_show');


Route::get('/categoryedit/{id}',function($id){

	$productdet = App\ProductCategory::where('category_id',$id )->get();
	return view('dashboard.editcategory',['productdet'=>$productdet]);
	
});
Route::get('/subcategoryedit/{id}',function($id){
    $product_cat_id=App\ProductCategory::where('is_deleted','0' )->get();
	$productsubdet = App\ProductSubcategory::where('subcategory_id',$id )->get();
	return view('dashboard.editsubcategory',['productsubdet'=>$productsubdet,'product_cat_id'=>$product_cat_id]);
	
});
Route::post('/updatesubcat','productcategory_controller@updatesub_page_show')->name('updatesubcat');

Route::get('/subcatdelete/{id}','productcategory_controller@subcat_delete_page');

Route::post('/update','AddProductCategory@update_page_show')->name('updatecat');

Route::get('/categorydelete/{id}','AddProductCategory@delete_page');


Route::post('/ajaxSendcatid','product_details@getsubcatdetails_func')->name('ajaxSendcatid');



Route::get('/categorypage',function(){
return view('mainpages.category');
});

Route::get('/categorypage/{id}','HomeController@getproductdetailsbycatid');
Route::get('/subcategorypage/{id}','HomeController@getproductdetailsbysubcatid');

Route::get('/singleproduct',function(){
return view('mainpages.single');
});

Route::get('/singleproduct/{id}',function($id){

	$productdetails = App\product::where('product_id',$id )->get();
	foreach($productdetails as $pdata){
	$category_name=   App\ProductCategory::where('category_id',$pdata->category_id)->get();
}
foreach($productdetails as $pdata){
$best_sellers=App\product::where('category_id',$pdata->category_id)->get();
}
	//$product_cat_id=App\ProductCategory::where('is_deleted','0' )->get();
	//$product_subcat_id=App\ProductSubcategory::where('is_deleted','0' )->get();
	return view('mainpages.single',['product_datas'=>$productdetails,'category_name'=>$category_name,'best_sellers'=>$best_sellers]);
	
});

Route::post('/ajaxpricerange','HomeController@getpricerange_func')->name('ajaxpricerange');

Route::get('/showcart',function(){
//if(Auth::check()&&Session::get('logged_user')=='1'){
	if(!empty(Session::get('session_frontuserid'))){
	$cart_data=App\cartmodel::where('is_deleted','0' )->where('user_id',Session::get('session_frontuserid'))->get();
	}else{
	$cart_data=App\cartmodel::where('is_deleted','0' )->where('user_id',$_COOKIE['user_id'])->get();	
		
	}

return view('mainpages.cart',['cart_data'=>$cart_data]);
//}

});


Route::post('cartprosub','HomeController@cartprodetails')->name('cartprosub');

Route::post('/ajaxupdateprice','HomeController@setpriceupdate_func')->name('ajaxupdateprice');

Route::get('/cartdelete/{id}','HomeController@subcart_delete_page');


Route::post('/ajaxaddprotocart','CartController@updatecartdetails')->name('ajaxaddprotocart');

Route::post('/pinloc','HomeController@getaddressfrompin')->name('pinloc');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
