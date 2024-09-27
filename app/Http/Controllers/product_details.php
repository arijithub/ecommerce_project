<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Input;
use App\product;
use DB;

class product_details extends Controller
{
   public function addproducts_page_show(){
  
    return view('dashboard.addproducts');

}
public function insertproducts_page_show(Request $request){
  
  $pro = new product;
  $pro->category_id =$request->category_id;
  $pro->subcategory_id =$request->subcategory_id;
    $pro->p_name = $request->p_name;  
  if ($request->hasFile('fileupload')) {
        $p_image = $request->file('fileupload');
        $name = time().'.'.$p_image->getClientOriginalExtension();
        $destinationPath = public_path('/product_image');
        $p_image->move($destinationPath, $name);
    $pro->p_image=$name;
    
        }
  $pro->price =$request->price;
    $pro->discount = $request->discount;  
    
  $pro->save();
  ?>
      <script>
      alert('product  table insert successfully');
      window.location.href='/addproducts';
    </script>
    <?php
  }
  public function updateproducts_page_show(Request $request){
    $id=$request->hidden_product_id;
     //$id->id = $request->hidden_category_id;
  //$user_data = ProductCategory::find($id);
  
    //$category_name=Input::get('categoryname');
    $category_id =$request->category_id;
    $subcategory_id =$request->subcategory_id;
    //echo $subcategory_id;
    
    $p_name =$request->p_name;
    $pro_img_name="";
    if ($request->hasFile('fileupload')) {
        $p_image = $request->file('fileupload');
        $pro_img_name = time().'.'.$p_image->getClientOriginalExtension();
        $destinationPath = public_path('/product_image');
        $p_image->move($destinationPath, $pro_img_name);
    
      }
      $price =$request->price;
      $discount = $request->discount;
      if($category_id!='' && $subcategory_id!='' && $p_name!=''  && $price!=''&& $pro_img_name!=''&& $discount!=''){
       $pro_count= product::where('product_id', $id)
          ->update(['category_id' => $category_id,'subcategory_id' => $subcategory_id,'p_name' => $p_name,'price'=>$price,'p_image'=>$pro_img_name,'discount' => $discount]);
     } 
     else if($category_id!='' && $subcategory_id!='' && $p_name!=''  && $price!='' ){
       $pro_count= product::where('product_id', $id)
          ->update(['category_id' => $category_id,'subcategory_id' => $subcategory_id,'p_name' => $p_name,'price'=>$price]);
     } 
     else if($category_id!='' && $subcategory_id!='' && $p_name!=''  && $price!=''&& $pro_img_name!='' ){
       $pro_count= product::where('product_id', $id)
          ->update(['category_id' => $category_id,'subcategory_id' => $subcategory_id,'p_name' => $p_name,'price'=>$price,'p_image'=>$pro_img_name]);
     } 
    else if($pro_img_name!=''){
       $pro_count= product::where('product_id', $id)
          ->update(['p_image'=>$pro_img_name]);
    }
    else if($discount!=''){
     $pro_count= product::where('product_id', $id)
          ->update(['discount' => $discount]);
    }
     
  /*
   
    else if($p_name!=''){
     $pro_count= product::where('product_id', $id)
          ->update(['p_name' => $p_name]);
    }
    else if($pro_img_name!=''){
       $pro_count= product::where('product_id', $id)
          ->update(['p_image'=>$pro_img_name]);
    }

else if($price!=''){
     $pro_count= product::where('product_id', $id)
          ->update(['price' => $price]);
    }

else if($discount!=''){
     $pro_count= product::where('product_id', $id)
          ->update(['discount' => $discount]);
    }
    */
      
  //$user_data->save($request->all());
          if($pro_count!=''){
  return redirect('/product');
}else{

  echo "Not updated";
}
}
public function products_delete_page(Request $request,$id){

$product_delete=product::where('product_id', $id)
          ->update(['is_deleted'=>'1']);



 if($product_delete!=''){
  return redirect('/product');
}else{

  echo "Not deleted";
}
}

 public function getsubcatdetails_func(Request $request){
         //$emp_names = DB::table('empdetails')->where('location_id',$request->send_location_id)->pluck('emp_name');
       //$pro_subcat_det=App\ProductSubcategory::where('category_id',$request->send_category_id)->get();
       $pro_subcat_det=DB::table('product_subcategories')->where('category_id',$request->send_category_id)->where('is_deleted','0')->get();
         $response = array(
          'status' => 'success',
          'msg' => $pro_subcat_det,
      );

      return response()->json($response); 

    }

}