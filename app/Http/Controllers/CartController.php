<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Input;
use App\ProductCategory;
use App\ProductSubcategory;
use  App\product;
use App\cartmodel;

use Session;
use DB;

class CartController extends Controller
{
    public function updatecartdetails(Request $request){

$cartdet = new cartmodel;
$cartdet->user_id=Session::get('session_frontuserid');

    $cartdet->product_id=$request->get_product_id;
    $cartdet->p_image=$request->get_pimg;
    $cartdet->p_name=$request->get_pname;
    $cartdet->p_price=$request->get_price;
    $cartdet->p_quantity=$request->get_quantity;
    $cartdet->subtotal_price=$request->get_subtot_price;
    $cartdet->save();
     echo "success";
    }
}
