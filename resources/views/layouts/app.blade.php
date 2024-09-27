<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{asset('asset/plugins/jquery/jquery.min.js')}}"></script>
     <script type="text/javascript">
    $(document).ready(function(){
        $('#pincode').keyup(function(){

             var pincode=$('#pincode').val();
             if(pincode==''){
                $('#address').val('');

             }
             else{
                
                $.ajax({

                 url:'{{route("pinloc")}}',
                 type:'post',
                 data:{pcode:pincode,_token: $('#_tokenforpin').val()},
                  cache : false,
                 success:function(data){
                    var obj = jQuery.parseJSON(data);
                    //var i=0;
                    var addr='';
                    var str='';
                     $.each(obj, function(key,value) {
                    
                      var i=0;
                      while(i<value.length){
                        if(value[i].Name!=undefined){
                        addr=value[i].Name+','+value[i].District+','+value[i].State+','+value[i].Country;
                       // console.log(addr);
                       
                       str=str+"<option value='"+addr+"'>"+addr+"</option>";
                           }
                        i=i+1;

                      }
                    
                    
                       
                   }); 
                   
                   $('#address').html(str);
                 }
                });
             }
        });

    });
</script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('loginpage') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                       
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
