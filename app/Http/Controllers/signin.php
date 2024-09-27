<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\usermodel;

class signin extends Controller
{
  public function signin_page()
  {
    return view('mainpages.signin');
  }
  
  
  
  public function signup_value_insert(Request $request){ 
        $user_data = new usermodel;
        $user_data->name = $request->name;
		$user_data->city = $request->city;
		$user_data->state = $request->state;
		$user_data->username = $request->username;
		$user_data->password = md5($request->password);
        $user_data->save();
		?>
        <script>
		alert('Registration successful');
		window.location.href='/';
		</script>
        <?php
  
  }
  
  
  
  
  
}
