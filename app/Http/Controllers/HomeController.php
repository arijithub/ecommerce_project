<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Cookie;
use App\ProductCategory;
use App\ProductSubcategory;
use  App\product;
use App\cartmodel;

use Session;
use DB;



class HomeController extends Controller
{
     public function index(){

    $product_cat_data = ProductCategory::where('is_deleted','0')->get();
    $product_subcat_data = ProductSubcategory::where('is_deleted','0')->get();
      //print_r($product_cat_data);
    return view('mainpages.homepage',['pro_cat_data'=>$product_cat_data,'product_subcat_data'=>$product_subcat_data]);
  }
  
    
  
  public function logout_user_func(){ 
  Session::flush();
  return redirect('/');
  }

  public function getproductdetailsbycatid($id){

       $product_datas= product::where('category_id',$id)->where('is_deleted', '0')->get();
       $product_category_name=ProductCategory::where('category_id',$id)->where('is_deleted','0')->get();
       $product_category_names=ProductCategory::where('is_deleted','0')->get();
       $product_sub_category_names=ProductSubcategory::where('is_deleted','0')->get();
       $cart_datas=cartmodel::where('is_deleted','0')->where('user_id',Session::get('session_frontuserid'))->get();
       return view('mainpages.category',['product_datas'=>$product_datas,'pro_name'=>$product_category_name,'pro_names'=>$product_category_names,'pro_sub_names'=>$product_sub_category_names,'cart_data'=>$cart_datas]);

  }
    public function getproductdetailsbysubcatid($id){

       $product_datas= product::where('subcategory_id',$id)->where('is_deleted', '0')->get();
       $product_sub_category_name=ProductSubcategory::where('subcategory_id',$id)->where('is_deleted','0')->get();
       $product_category_names=ProductCategory::where('is_deleted','0')->get();
       $product_sub_category_names=ProductSubcategory::where('is_deleted','0')->get();

       //$product_sub_category_names=ProductSubcategory::where('is_deleted','0')->get();
       return view('mainpages.subcategory',['product_datas'=>$product_datas,'pro_name'=>$product_sub_category_name,'pro_names'=>$product_category_names,'pro_sub_names'=>$product_sub_category_names]);

  }

  public function showproductdetails(){

    return view('mainpages.productdetails');
  }

  public function getpricerange_func(Request $request){
         // $cat_id=request()->segment(2);
        $pro_det_by_price=DB::table('products')->where('price','>=',$request->send_price_from)->where('price','<=',$request->send_price_to)->where('category_id',$request->send_cat_id_by_seg)->where('is_deleted','0')->get();
         $str='';
         $img_folder=url('/').'/product_image';
         foreach($pro_det_by_price as $data){

 $str=$str."<div class='col-lg-4 col-sm-6'><div class='single_category_product'><div class='single_category_img'><img src='".$img_folder."/".$data->p_image."' alt=''><div class='category_social_icon'><ul><li><a href='#'><i class='ti-heart'></i></a></li><li><a href='#'><i class='ti-bag'></i></a></li></ul></div><div class='category_product_text'><a href='/singleproduct/".$data->product_id."'><h5>".$data->p_name."</h5></a><p>".$data->price."</p></div></div></div></div>";






         }  

      echo $str;

  }


public function cartprodetails(Request $request)
{
    // Generate a unique device ID
    $device_id = uniqid() . '_' . substr(time(), -5);

    // Check if the user_id cookie is set, if not set it
    if (!Cookie::has('user_id')) {
        Cookie::queue(Cookie::make('user_id', $device_id, 60 * 24 * 30)); // Cookie valid for 30 days
    }

    // Retrieve the user_id from the session or cookie
    $user_id = Session::get('session_frontuserid', Cookie::get('user_id', $device_id));

    // Check if the product is already added to the cart
    $product_already_added = CartModel::where('product_id', $request->p_id)
        ->where('user_id', $user_id)
        ->where('is_deleted', '0')
        ->get();

    // If the product is not already in the cart, add it
    if ($product_already_added->isEmpty()) {
        $cartdet = new CartModel;
        $cartdet->user_id = $user_id;
        $cartdet->product_id = $request->p_id;
        $cartdet->p_image = $request->p_image;
        $cartdet->p_name = $request->p_name;
        $cartdet->p_price = $request->p_price;
        $cartdet->p_quantity = $request->p_quantity;
        $cartdet->subtotal_price = $cartdet->p_price * $cartdet->p_quantity;

        if ($cartdet->save()) {
            return redirect('/showcart');
        }
    } else {
        $p_id = $request->p_id;
        $msg = "Product already added";
        return redirect('/singleproduct/' . $p_id)->with(['mess' => $msg]);
    }
}

  public function setpriceupdate_func(Request $request){

 $price_update=DB::table('cartmaster')->where('product_id',$request->get_product_id)->where('user_id',Session::get('session_frontuserid'))->update(['p_quantity' => $request->get_quantity,'subtotal_price'=>$request->get_subtot_price]);
        
        



  }

  public function subcart_delete_page(Request $request,$id){

$subcart_delete=cartmodel::where('cart_id', $id)
          ->update(['is_deleted'=>'1']);



 if($subcart_delete!=''){
  return redirect('/showcart');
}else{

  echo "Not deleted";
}

  
  
}


public function getaddressfrompin(Request $request){

$pincode= $request->pcode;
$data=file_get_contents('http://postalpincode.in/api/pincode/'.$pincode);

//print_r($data);
 

      return response()->json($data); 

}


}
