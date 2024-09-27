<!doctype html>
<html>

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>winter</title>
<link rel="icon" href="{{asset('img/favicon.png')}}">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
<!-- animate CSS -->
<link rel="stylesheet" href="{{asset('css/animate.css')}}">
<!-- owl carousel CSS -->
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">

<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="{{asset('css/lightslider.min.css')}}">
<!-- font awesome CSS -->
<link rel="stylesheet" href="{{asset('css/all.css')}}">
<link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
<!-- flaticon CSS -->
<link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
<link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
<!-- font awesome CSS -->
<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
<!-- swiper CSS -->
<link rel="stylesheet" href="{{asset('css/slick.css')}}">
<link rel="stylesheet" href="{{asset('css/price_rangs.css')}}">
<!-- style CSS -->
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<script src="{{asset('asset/plugins/jquery/jquery.min.js')}}"></script>
 <script src="{{asset('js/price_rangs.js')}}"></script>
<script type="text/javascript">

    $(function(){
       // $("#LoadingImage").hide();
      
       function filter_data(){
          var get_price_from=$('.price-from').val();
          var get_price_to=$('.price-to').val();
           //$("#LoadingImage").show();
           $('.scp').html('wait...');
            $('.scp').empty();
           $.ajax({
               type:'POST',
               url:'{{route("ajaxpricerange")}}',
               data : {send_price_from:get_price_from,send_price_to:get_price_to,send_cat_id_by_seg: $('#getcatidseg').val(), _token: $('#_token').val()},
               cache : false,
               beforeSend: function() {


             //var strld= "<img src='{{asset('img/ajax-loader-preview.png')}}' height='100' width='100' />";
            
            
                $('.scp').html('wait...');

                },
              success : function(data){
               //console.log(data);
             // $('.scp').empty();
               $('.scp').html(data);

             

              }
              });

    

       }

        
      


       var $range = $(".js-range-slider"),
    $inputFrom = $(".js-input-from"),
    $inputTo = $(".js-input-to"),
    instance,
    min = 0,
    max = 1000,
    from = 10,
    to = 100;

$range.ionRangeSlider({
    type: "double",
    min: min,
    max: max,
    from: 0,
    to: 500,
  prefix: 'tk. ',
    onStart: updateInputs,
    onChange: updateInputs,
    step: 1,
    prettify_enabled: true,
    prettify_separator: ".",
  values_separator: " - ",
  force_edges: true,
  onFinish: function (data) {
            filter_data();
        }
  

});

instance = $range.data("ionRangeSlider");

function updateInputs (data) {
    from = data.from;
    to = data.to;
    
    $inputFrom.prop("value", from);
    $inputTo.prop("value", to); 
}

$inputFrom.on("input", function () {
    var val = $(this).prop("value");
    
    // validate
    if (val < min) {
        val = min;
    } else if (val > to) {
        val = to;
    }
    
    instance.update({
        from: val
    });
});

$inputTo.on("input", function () {
    var val = $(this).prop("value");
    
    // validate
    if (val < from) {
        val = from;
    } else if (val > max) {
        val = max;
    }
    
    instance.update({
        to: val
    });
});



//  Calculation of quantity

$('.quant_calc').change(function(){

var quant=$(this).val();
var unit_price=$(this).parents('tr.cart_row').find('h5.price_count').text();
var sub_tot=quant*unit_price;
$(this).parents('tr.cart_row').find('h5.subtot_count').text(sub_tot);
var proid=$(this).parents('tr.cart_row').find('.hidden_pid').val();
// Calculation of subtotal
var subtotal=0;
$('tr.cart_row').each(function(index,value){
var stot=$(this).find('h5.subtot_count').text();
subtotal=parseInt(subtotal)+parseInt(stot);


});
$('h5.final_sub_total').text(subtotal);

// Ajax calls for updating the price in the database

           $.ajax({
               type:'POST',
               url:'{{route("ajaxupdateprice")}}',
               data : {get_quantity:quant,get_subtot_price:sub_tot,get_product_id:proid, _token: $('#_token').val()},
               cache : false,
              
              success : function(data){
              
               //$('.scp').html(data);

                 }
              });


});

// add products to cart using ajax
$('.addedtocart').hide();
$('.btnproadd').click(function(){


    var quant=1;
var unit_price=$(this).parents('.single_category_product').find('p.price_count').text();
var sub_tot=quant*unit_price;
//$(this).parents('tr.cart_row').find('h5.subtot_count').text(sub_tot);
var proid=$(this).parents('.single_category_product').find('.hidden_pid').val();
var proname=$(this).parents('.single_category_product').find('h5.cart_pname').text();
var proimg=$(this).parents('.single_category_product').find('.hidden_pimg').val();
var currentclass=$(this).parents('.single_category_product');
var cur=$(this);
 $.ajax({
               type:'POST',
               url:'{{route("ajaxaddprotocart")}}',
               data : {get_quantity:quant,get_subtot_price:sub_tot,get_product_id:proid,get_pname:proname,get_pimg:proimg,get_price:unit_price, _token: $('#_tokenforcart').val()},
               cache : false,
              
              success : function(data){
              
               //$('.scp').html(data);
              //$(this).hide();
              cur.hide();
              currentclass.find('span.addedtocart').show();
              


                 }
              });







        });


      

    });

</script>

</head>

<body>
<!--::header part start::-->
<header class="main_menu home_menu">
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-11">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{ url('/')}}"> <img src="{{asset('img/logo.png')}}" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/')}}">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Shop
                                </a>
								<?php
								$catid_to_show=\DB::table('product_categories')->orderBy('created_at', 'asc')->get();
								
								?>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                    <a class="dropdown-item" href="/categorypage/<?php echo $catid_to_show[0]->category_id; ?>"> shop category</a>
                                    <!--<a class="dropdown-item" href="single-product.html">product details</a>-->
                                    
                                </div>
                            </li>
                            <!--<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    pages
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item" href="login.html"> 
                                        login
                                        
                                    </a>
                                    <a class="dropdown-item" href="tracking.html">tracking</a>
                                    <a class="dropdown-item" href="checkout.html">product checkout</a>
                                    <a class="dropdown-item" href="cart.html">shopping cart</a>
                                    <a class="dropdown-item" href="confirmation.html">confirmation</a>
                                    <a class="dropdown-item" href="elements.html">elements</a>
                                </div>
                            </li>
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_2"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    blog
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item" href="blog.html"> blog</a>
                                    <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                </div>
                            </li>-->
                            
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">
                        <div class="dropdown cart">
                            <a class="dropdown-toggle" href="/showcart">
                                <!-- <i class="ti-bag"></i> -->
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                            
                        @guest
                           
                                <a  href="{{route('loginpage')}}">{{ __('Login') }}</a>
                          
                           
                            @if (Route::has('register'))
                              
                                    <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                                
                            

                          @endif
                          @else 
                            @if(Session::get('logged_user')!='1')
                           <a  href="{{route('loginpage')}}">{{ __('Login') }}</a>
                             @endif
                            @if(Auth::check())
                                @if(Session::get('logged_user')=='1') 
                                
                                <?php
								if(Session::has('logged_user_email')){
                                $logged_user_email=Session::get('logged_user_email');
                                $logged_user_data=App\User::where('email',$logged_user_email)->get();
                                foreach($logged_user_data as $data){
                                  $logged_user_name=$data->name;
                                  $logged_user_id=$data->id;
                                }
                                Session::put('session_frontuserid',$logged_user_id);
                                echo $logged_user_name;
								}
                                
                                  
                                ?>

                               
                                    <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                  @endif
                              @endif
                           
                          @endguest
                    
                            <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="single_product">

                                </div>
                            </div> -->
                        </div>
                        <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="search_input" id="search_input_box">
        <div class="container">
            <form class="d-flex justify-content-between search-inner">
                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                <button type="submit" class="btn"></button>
                <span class="ti-close" id="close_search" title="Close Search"></span>
            </form>
        </div>
    </div>
</header>
<!-- Header part end-->