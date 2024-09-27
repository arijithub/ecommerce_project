<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('asset/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('asset/plugins/tempusdominus-bootstrap-4/css/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{asset('asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('asset/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('asset/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('asset/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('asset/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="{{asset('asset/plugins/jquery/jquery.min.js')}}"></script>
  <script>
  $(function(){
    $('#category_id_add').change(function(){
      
     var get_category_id=$('#category_id_add').val();
      $.ajax({
               type:'POST',
               url:'{{route("ajaxSendcatid")}}',
               data : {send_category_id:get_category_id,  _token: $('#_token').val()},
               dataType: 'json',
              success : function(data){
                var str="";
                $.each(data.msg, function (index, value) {
                 str=str+"<option value='"+value.subcategory_id+"'>"+value.name+"</option>";
                   
                    
                     });
                //alert(str);
                 $('#subcategory_id_add').html(str);
                
               
            

                }
            });

    });
    $('#category_id_edit').change(function(){
      if($("#subcategory_id_edit").hasClass("editsubtemp")){
     $('#subcategory_id_edit').html('');
   }
     var get_category_id=$('#category_id_edit').val();
      $.ajax({
               type:'POST',
               url:'{{route("ajaxSendcatid")}}',
               data : {send_category_id:get_category_id,  _token: $('#_token').val()},
               dataType: 'json',
              success : function(data){
                var str="";
                $.each(data.msg, function (index, value) {
                 str=str+"<option value='"+value.subcategory_id+"'>"+value.name+"</option>";
                   
                    
                     });
                 $('#subcategory_id_edit').html(str);
                
               
            

                }
            });

    });

  });
</script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/dashboard" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">      
      <li class="nav-item">
        <a href="{{ url('/adminlogout')}}" style="color:red;">Logout
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard')}}" class="brand-link">
      <img src="{{asset('asset/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('asset/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block">Hello <?php echo Session::get('session_user'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="{{url('/category')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/subcategory')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Sub Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/product')}}" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Product</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>