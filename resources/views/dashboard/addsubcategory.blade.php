@extends('dashboard.layouts.layoutmain')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sub Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">SubCategory</li>
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
              <h3 class="card-title">Add Sub Category</h3>
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/subcategory')}}">List of Sub Category</a></li>              
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
                <h3 class="card-title">Add Sub Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" name="addsubcategory" id="addsubcategory" action="{{route('productsubcatsubmit')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
                <div class="card-body">
                   <div class="form-group">
                    
                    <label for="exampleInputEmail1">Category_Name</label>
                    <!--<input type="text" class="form-control" id="category_id" name="category_id">-->
                    <select class="form-control" id="category_id" name="category_id">
                      <?php
                      if(isset($product_cat_id)){
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

                    <label for="exampleInputEmail1">SubCategory Name</label>
                    <input type="text" class="form-control" id="subcategoryname" name="subcategoryname" placeholder="Enter Category Name">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Image</label>
                    <input type="file" class="form-control" id="categoryname" name="fileupload" placeholder="Enter Category Name">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="subcatsubmit" id="subcatsubmit" value="Submit">
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