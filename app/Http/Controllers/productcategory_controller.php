<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductSubcategory;
//use Illuminate\Support\Facades\Input;
//use App\ProductCategory;

class productcategory_controller extends Controller
{
     public function category_page_show(){
    
  }
   public function addsubcategory_page_show(){
    $product_cat_id=App\ProductCategory::where('is_deleted','0' )->get();
  
    return view('dashboard.addsubcategory',['product_cat_id'=>$product_cat_id]);
  }
  public function insertsubcatname_page_show(Request $request){
  
  $subcat = new ProductSubcategory;
  $subcat->category_id = $request->category_id;
    $subcat->name = $request->subcategoryname;  
  if ($request->hasFile('fileupload')) {
        $image = $request->file('fileupload');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/subcategory_image');
        $image->move($destinationPath, $name);
    $subcat->image=$name;
    
        }
    
    
  $subcat->save();
  ?>
      <script>
      alert('product subcategory table insert successfully');
      window.location.href='/addsubcategory';
    </script>
    <?php
  }
  public function updatesub_page_show(Request $request){
    $id=$request->hidden_subcategory_id;
     //$id->id = $request->hidden_category_id;
  //$user_data = ProductCategory::find($id);
  
    //$category_name=Input::get('categoryname');
    $category_id=$request->category_id;
     $subcategory_name=$request->subcategoryname;
    $subcat_img_name="";
    if ($request->hasFile('fileupload')) {
        $image = $request->file('fileupload');
        $subcat_img_name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/subcategory_image');
        $image->move($destinationPath, $subcat_img_name);
    
      }
       if($subcategory_name!=''&&$category_id!=''&&$subcat_img_name!=''){
       $subcat_count= ProductSubcategory::where('subcategory_id', $id)
          ->update(['name' => $subcategory_name,'category_id' => $category_id,'image'=>$subcat_img_name]);
     } 
      
     else if($subcategory_name!=''){
       $subcat_count= ProductSubcategory::where('subcategory_id', $id)
          ->update(['name' => $subcategory_name]);
     } 
   else if($category_id!=''){
     $subcat_count= ProductSubcategory::where('subcategory_id', $id)
          ->update(['category_id' => $category_id]);
    }
     
  else if($subcat_img_name!=''){
       $subcat_count= ProductSubcategory::where('subcategory_id', $id)
          ->update(['image'=>$subcat_img_name]);
    }



      
  //$user_data->save($request->all());
          if($subcat_count!=''){
  return redirect('/subcategory');
}else{

  echo "Not updated";
}
}
public function subcat_delete_page(Request $request,$id){

$subcat_delete=ProductSubcategory::where('subcategory_id', $id)
          ->update(['is_deleted'=>'1']);



 if($subcat_delete!=''){
  return redirect('/subcategory');
}else{

  echo "Not deleted";
}

  
  
}
}