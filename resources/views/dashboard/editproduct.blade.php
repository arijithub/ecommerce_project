@extends('dashboard.layouts.layoutmain')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Product</h3>
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/product')}}">List of Product</a></li>              
            </ol>
            </div>
            <!-- /.card-header -->
            <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" name="editproduct" id="editproduct" action="{{route('updatepro')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              @method('POST')
              <?php
              if(isset($productdet)){
                $cat_id=0;
              foreach ($productdet as $pro) {
               ?>
                <div class="card-body">
                  <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token" />
                  <input type="hidden" name="hidden_product_id" value="<?php echo $pro->product_id; ?>">
                  <div class="form-group">
                    
                    <label for="exampleInputEmail1">Category_Name</label>
                      <select class="form-control" id="category_id_edit" name="category_id">
                      <?php
                      if(isset($product_cat_id)){
                        foreach ($product_cat_id as $data){
                        ?> 
                      <option value="<?php echo $data->category_id; ?>" <?php if($data->category_id==$pro->category_id){ echo "selected";} ?>><?php echo $data->name; ?></option>
                      <?php
                         }
                       }
                       ?>
                      
                    </select>
                  </div>
                   <div class="form-group">
                    
                    <label for="exampleInputEmail1">SubCategory_Name</label>
                     <select class="form-control" id="subcategory_id_edit" name="subcategory_id">
                       <?php
                       echo $cat_id;
                      if(isset($product_subcat_id)){
                        foreach ($product_subcat_id as $data){
                        ?> 
                        <?php
                        if($pro->category_id==$data->category_id){?>
                      <option class="editsubtemp" value="<?php echo $data->subcategory_id; ?>" <?php if($data->subcategory_id==$pro->subcategory_id){echo "selected";} ?>><?php echo $data->name; ?></option>
                      <?php
                           }
                         }
                       }
                       ?>
                      
                    </select>
                  </div>
                 <!-- <div class="form-group">
                    
                    <label for="exampleInputEmail1">SubCategory_Id</label>
                      <input type="number" class="form-control" id="subcategory_id" name="subcategory_id" value="<?php echo $pro->subcategory_id; ?>">
                  </div>-->
                  <div class="form-group">
                    <label for="exampleInputEmail1"> Product Name</label>
                    <input type="text" class="form-control" id="subcategoryname" name="p_name" value="<?php echo $pro->p_name; ?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Image</label>
                    <input type="file" class="form-control" id="p_image" name="fileupload" value="<?php echo "/".$pro->p_image; ?>">
                    Image:<img src="{{asset('product_image')}}<?php echo "/".$pro->p_image; ?>"  height="100" width="100">
                  </div>
                  <div class="form-group">
                    
                    <label for="exampleInputEmail1">Price</label>
                      <input type="number" class="form-control" id="price" name="price" value="<?php echo $pro->price; ?>">
                  </div>
                   <div class="form-group">
                    
                    <label for="exampleInputEmail1">Discount</label>
                      <input type="number" class="form-control" id="discount" name="discount" value="<?php echo $pro->discount; ?>">
                  </div>
                </div>
                <!-- /.card-body -->
                <?php
              }
            
            ?>

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="updatepro" id="updatepro" value="Submit">
                </div>
                <?php
                }
                ?>
              </form>
            </div>
            <!-- /.card -->


          </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  
@stop