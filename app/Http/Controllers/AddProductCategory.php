<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Input;
use App\ProductCategory;
class AddProductCategory extends Controller
{
    public function addcategory_page_show(){
	
	  return view('dashboard.addcategory');
	}
	
	
	public function insertcatname_page_show(Request $request){
	
	$user_data = new ProductCategory;
    $user_data->name = $request->categoryname;	
	if ($request->hasFile('fileupload')) {
        $image = $request->file('fileupload');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/category_image');
        $image->move($destinationPath, $name);
		$user_data->image=$name;
		
        }
		
    
	$user_data->save();
	?>
    	<script>
			alert('product category table insert successfully');
			window.location.href='/addcategory';
		</script>
    <?php
	}
	
	public function update_page_show(Request $request){
		$id=$request->hidden_category_id;
		 //$id->id = $request->hidden_category_id;
	//$user_data = ProductCategory::find($id);
	
    //$category_name=Input::get('categoryname');
		 $category_name=$request->categoryname;
    $cat_img_name="";
    if ($request->hasFile('fileupload')) {
        $image = $request->file('fileupload');
        $cat_img_name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/category_image');
        $image->move($destinationPath, $cat_img_name);
		
      }
      
     if($category_name!=''&&$cat_img_name!=''){
     	 $cat_count= ProductCategory::where('category_id', $id)
          ->update(['name' => $category_name,'image'=>$cat_img_name]);
     } 
     
   else if($category_name!=''){
     $cat_count= ProductCategory::where('category_id', $id)
          ->update(['name' => $category_name]);
    }
    else if($cat_img_name!=''){
    	 $cat_count= ProductCategory::where('category_id', $id)
          ->update(['image'=>$cat_img_name]);
    }



      
	//$user_data->save($request->all());
          if($cat_count!=''){
	return redirect('/category');
}else{

	echo "Not updated";
}
}

public function delete_page(Request $request,$id){

$category_delete=ProductCategory::where('category_id', $id)
          ->update(['is_deleted'=>'1']);



 if($category_delete!=''){
	return redirect('/category');
}else{

	echo "Not deleted";
}
}

	
}
