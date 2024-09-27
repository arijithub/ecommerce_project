@extends('dashboard.layouts.layoutmain')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
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
              <h3 class="card-title">Products List</h3>
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/addproducts')}}">Add Products</a></li>              
            </ol>
            </div>
            <!-- /.card-header -->
           
           <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Category_Id</th>
                  <!--<th>Subcategory_Id</th>-->
                  <th>Name</th>
                  <th>Image</th> 
                  <th>Price</th>
                  <th>Discount</th>                 
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
        if(isset($product_det)){
        foreach($product_det as $pro){?>
                <tr>
                  <td><?php echo $pro->category_id; ?></td>
                  <!--<td><?php echo $pro->subcategory_id; ?></td>-->
                  <td><?php  echo $pro->p_name; ?></td>
                  <td><img src="{{asset('product_image')}}<?php echo "/".$pro->p_image; ?>" height="100" width="100"/></td>
                  <td><?php echo $pro->price; ?></td>
                  <td><?php echo $pro->discount; ?></td>
                  <td><a href="/productedit/<?php echo $pro->product_id; ?>">Edit</a> | <a href="/productdelete/<?php echo $pro->product_id; ?>" onclick="return confirm('Do you surely want to delete?');">Delete</a></td>                  
                </tr>
        <?php
        }
      }
      ?>
                
                </tbody>
                <tfoot>
                
                </tfoot>
              </table>
            </div>
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