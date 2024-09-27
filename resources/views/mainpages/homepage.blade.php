@extends('mainpages.layouts.layoutmain')
@section('content')

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="banner_slider">
                        <div class="single_banner_slider">
                            <div class="banner_text">
                                <div class="banner_text_iner">
                                    <h5>Winter Fasion</h5>
                                    <h1>Fashion Collection 2019</h1>
                                    <a href="#" class="btn_1">shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <!-- feature_part start-->
    <section class="feature_part pt-4">
        <div class="container-fluid p-lg-0 overflow-hidden">
            <div class="row align-items-center justify-content-between owl-carousel owl-theme">
                 <?php
                    if(isset($pro_cat_data)){
                    foreach ($pro_cat_data as $data) {
                        ?>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_feature_post_text weidth_1 item">
                        <img src="{{asset('category_image')}}<?php echo "/".$data->image; ?>" alt="#">
                        <div class="hover_text">
                            <a href="/categorypage/<?php echo $data->category_id; ?>" class="btn_2"><?php echo $data->name; ?></a>
                        </div>
                    </div>
                </div>
                <!--<div class="col-lg-4 col-sm-6">
                    <div class="single_feature_post_text">
                        <img src="{{asset('img/feature_2.png')}}" alt="#">
                        <div class="hover_text">
                            <a href="single-product.html" class="btn_2">shop for male</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="single_feature_post_text">
                        <img src="{{asset('img/feature_3.png')}}" alt="#">
                        <div class="hover_text">
                            <a href="single-product.html" class="btn_2">shop for male</a>
                        </div>
                    </div>
                </div>-->
                <?php
            }
        }
        ?>
            </div>
        </div>
    </section>
    <!-- upcoming_event part start-->

    <!-- new arrival part here -->
    <section class="new_arrival section_padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="arrival_tittle">
                        <h2>Choose from wide variety of products</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="arrival_filter_item filters">
                        <ul>
                             <?php
                    if(isset($pro_cat_data)){
                    foreach ($pro_cat_data as $data) {
                        ?>
                            <li class="active controls" data-filter=".<?php echo str_replace(' ','-',strtolower($data->name)); ?>"><?php echo $data->name; ?></li>
                        <?php } 
                    }?>
                           <!-- <li class="controls" data-toggle=".men">men</li>
                            <li class="controls" data-toggle=".women">women</li>
                            <li class="controls" data-toggle=".shoes">shoes</li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                        
                    <div class="new_arrival_iner filter-container">
                         <?php
                         if(isset($pro_cat_data)){
                    foreach ($pro_cat_data as $pro) {
                    if(isset($product_subcat_data)){
                    foreach ($product_subcat_data as $data) {
                        
                        if($pro->category_id==$data->category_id){
                        ?>

                        <div class="single_arrivel_item weidth_3 <?php echo str_replace(' ','-',strtolower($pro->name)); ?> mix">
                            <img src="{{asset('subcategory_image')}}<?php echo "/".$data->image; ?>" alt="#">
                            <div class="hover_text">
                                <p></p>
                                 <a href="/subcategorypage/<?php echo $data->subcategory_id; ?>"><h3><?php echo $data->name; ?></h3></a>
                                <!--<div class="rate_icon">
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                </div>-->
                                <!--<h5>$150</h5>-->
                                <!--<div class="social_icon">
                                    <a href="#"><i class="ti-heart"></i></a>
                                    <a href="#"><i class="ti-bag"></i></a>
                                </div>-->
                            </div>
                        </div>
                        <?php
                    }
                    else{
                        continue;
                    }
                    }
                }
                 }
                }
                ?>
                        <!--<div class="single_arrivel_item weidth_2 mix women">
                            <img src="{{asset('img/arrivel/arrivel_2.png')}}" alt="#">
                            <div class="hover_text">
                                <p>Canvas</p>
                                <a href="single-product.html"><h3>Lorem Canvas Low-Top Sneaker</h3></a>
                                <div class="rate_icon">
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                </div>
                                <h5>$150</h5>
                                <div class="social_icon">
                                    <a href="#"><i class="ti-heart"></i></a>
                                    <a href="#"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="single_arrivel_item weidth_3 mix shoes women" >
                            <img src="{{asset('img/arrivel/arrivel_3.png')}}" alt="#">
                            <div class="hover_text">
                                <p>Canvas</p>
                                <a href="single-product.html"><h3>Lorem Canvas Low-Top Sneaker</h3></a>
                                <div class="rate_icon">
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                </div>
                                <h5>$150</h5>
                                <div class="social_icon">
                                    <a href="#"><i class="ti-heart"></i></a>
                                    <a href="#"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="single_arrivel_item weidth_3 mix women men">
                            <img src="{{asset('img/arrivel/arrivel_4.png')}}" alt="#">
                            <div class="hover_text">
                                <p>Canvas</p>
                                <a href="single-product.html"><h3>Lorem Canvas Low-Top Sneaker</h3></a>
                                <div class="rate_icon">
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                </div>
                                <h5>$150</h5>
                                <div class="social_icon">
                                    <a href="#"><i class="ti-heart"></i></a>
                                    <a href="#"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="single_arrivel_item weidth_2 mix men women">
                            <img src="{{asset('img/arrivel/arrivel_1.png')}}" alt="#">
                            <div class="hover_text">
                                <p>Canvas</p>
                                <a href="single-product.html"><h3>Lorem Canvas Low-Top Sneaker</h3></a>
                                <div class="rate_icon">
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                </div>
                                <h5>$150</h5>
                                <div class="social_icon">
                                    <a href="#"><i class="ti-heart"></i></a>
                                    <a href="#"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="single_arrivel_item weidth_1 mix shoes men">
                            <img src="{{asset('img/arrivel/arrivel_6.png')}}" alt="#">
                            <div class="hover_text">
                                <p>Canvas</p>
                                <a href="single-product.html"><h3>Lorem Canvas Low-Top Sneaker</h3></a>
                                <div class="rate_icon">
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                    <a href="#"> <i class="fas fa-star"></i> </a>
                                </div>
                                <h5>$150</h5>
                                <div class="social_icon">
                                    <a href="#"><i class="ti-heart"></i></a>
                                    <a href="#"><i class="ti-bag"></i></a>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div> 
            </div>
        </div>
    </section>
    <!-- new arrival part end -->

   
@stop
    