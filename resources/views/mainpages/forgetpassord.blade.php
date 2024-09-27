@extends('mainpages.layouts.layoutmain')
@section('content')
 
    <section class="login_part section_padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>New to our Shop?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                            <a href="{{ url('/signup')}}" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome Back ! <br>
                                Forgetpassword?</h3>
                            
                            <form method="post" name="signinform" id="signinform" class="row contact_form" action='#'>
                       {{csrf_field()}}
                                <div class="col-md-12 form-group p_star">
                                <label>Email</label>
                                    <input type="text" class="form-control" name="username" id="username" value=""
                                        placeholder="Email">
                                </div>
                                <div class="col-md-12 form-group"> 
                                    <input name="forgotpass" id="forgotpass" type="submit" value="Send" />                                    
                                </div>
                                
                            </form>
                            <?php echo Session::get('err'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

    <!-- subscribe_area part start-->
    <section class="instagram_photo">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="instagram_photo_iner">
                        <div class="single_instgram_photo">
                            <img src="img/instagram/inst_1.png" alt="">
                            <a href="#"><i class="ti-instagram"></i></a> 
                        </div>
                        <div class="single_instgram_photo">
                            <img src="img/instagram/inst_2.png" alt="">
                            <a href="#"><i class="ti-instagram"></i></a> 
                        </div>
                        <div class="single_instgram_photo">
                            <img src="img/instagram/inst_3.png" alt="">
                            <a href="#"><i class="ti-instagram"></i></a> 
                        </div>
                        <div class="single_instgram_photo">
                            <img src="img/instagram/inst_4.png" alt="">
                            <a href="#"><i class="ti-instagram"></i></a> 
                        </div>
                        <div class="single_instgram_photo">
                            <img src="img/instagram/inst_5.png" alt="">
                            <a href="#"><i class="ti-instagram"></i></a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--::subscribe_area part end::-->
@stop    