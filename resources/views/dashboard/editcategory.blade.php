@extends('dashboard.layouts.layoutmain')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Edit Category</li>
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
              <h3 class="card-title">Edit Category</h3>
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/category')}}">List of Category</a></li>              
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
                <h3 class="card-title">Edit Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" name="editcategory" id="editcategory" action="{{route('updatecat')}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              @method('POST')
              <?php
              if(isset($productdet)){
              foreach ($productdet as $data) {
               ?>
                <div class="card-body">
                  <input type="hidden" name="hidden_category_id" value="<?php echo $data->category_id; ?>">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control" id="categoryname" name="categoryname" value="<?php echo $data->name; ?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Image</label>
                    <input type="file" class="form-control" id="categoryname" name="fileupload" value="<?php echo "/".$data->image; ?>">
                    Image:<img src="{{asset('category_image')}}<?php echo "/".$data->image; ?>"  height="100" width="100">
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <?php
              }
            
            ?>

                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" name="updatecat" id="updatecat" value="Submit">
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