<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Input;
use DB;
use Session;

class signup extends Controller
{
   public function signup_page()
  {
    return view('mainpages.signup');
  }
  
  
  
  
  
  
  
  
 public function signin_value_check(Request $request){
 
	$txtusername=$request->input('username');
	$txtpassword=$request->input('password');
	$admin_txtusers = DB::table('usertable')
                ->where('username', $txtusername)
				->where('password', md5($txtpassword))
                ->get();
     $txtuserid=DB::table('usertable')
                ->where('username', $txtusername)
                ->where('password', md5($txtpassword))
                ->value('userid');
		
	if(count($admin_txtusers)>0){	
		Session::put('session_frontuser',$txtusername);		
	Session::put('session_frontuserid',$txtuserid);		
	return redirect('/');
	}else{
	$errmsg="<span style='color:red'>Wrong username or password</span>";
	return redirect('/signin')->with(['err'=>$errmsg]);
	
	}
	
	} 
  
  
  
  
  
  
}
