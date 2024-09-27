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
              <li class="breadcrumb-item active">Subcategory</li>
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
              <h3 class="card-title">SubCategory List</h3>
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/addsubcategory')}}">Add Subcategory</a></li>              
            </ol>
            </div>
            <!-- /.card-header -->
           
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Category_Id</th>
                  <th>Name</th>
                  <th>Image</th>                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
				if(isset($product_subcat_det)){
				foreach($product_subcat_det as $sub){?>
                <tr>
                  <td><?php echo $sub->category_id; ?></td>
                  <td><?php  echo $sub->name; ?></td>
                  <td><img src="{{asset('subcategory_image')}}<?php echo "/".$sub->image; ?>" height="100" width="100"/></td>
                  <td><a href="/subcategoryedit/<?php echo $sub->subcategory_id; ?>">Edit</a> | <a href="/subcatdelete/<?php echo $sub->subcategory_id; ?>" onclick="return confirm('Do you surely want to delete?');">Delete</a></td>                  
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