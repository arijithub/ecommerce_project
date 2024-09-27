@extends('dashboard.layouts.layoutmain')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
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
              <h3 class="card-title">Add Products</h3>
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
                <h3 class="card-title">Add Products</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" name="addproducts" id="addproducts" action="{{route('productsubmit')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token" />
                    
                    <label for="exampleInputEmail1">Category_Name</label>
                     <select class="form-control" id="category_id_add" name="category_id">
                      <?php
                      if(isset($product_cat_id)){?>
                        <option value="">Choose a category</option>
                          <?php
                        foreach ($product_cat_id as $data){
                        ?> 
                      <option value="<?php echo $data->category_id; ?>"><?php echo $data->name; ?></option>
                      <?php
                         }
                       }
                       ?>
                      
                    </select>
                  </div>
                   <div class="form-group">
                    
                    <label for="exampleInputEmail1">SubCategory_Name</label>
                     <select class="form-control" id="subcategory_id_add" name="subcategory_id">
                      
                      
                    </select>
                  </div>
                  <!-- <div class="form-group">
                    
                    <label for="exampleInputEmail1">subCategory_Id</label>
                    <input type="number" class="form-control" id="subcategory_id" name="subcategory_id">
                  </div>-->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" class="form-control" id="p_name" name="p_name" placeholder="Enter Product Name">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Image</label>
                    <input type="file" class="form-control" id="p_image" name="fileupload" placeholder="Enter Category Name">
                  </div>

                  <div class="form-group">
                    
                    <label for="exampleInputEmail1">Price</label>
                    <input type="number" class="form-control" id="price" name="price">
                  </div>
                  <div class="form-group">
                    
                    <label for="exampleInputEmail1">Discount</label>
                    <input type="number" class="form-control" id="discount" name="discount">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="prosubmit" id="prosubmit" value="Submit">
                </div>
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