<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;


class LoginController extends Controller
{
   
   public function login_page_show(){
   
    return view('loginpages.login');
	}
	public function login_check(Request $request){
	$username=$request->input('username');
	$password=$request->input('pass');
	$admin_users = DB::table('adminlogin')
                ->where('username', $username)
				->where('password', $password)
                ->get();
	Session::put('session_user',$username);
	if(count($admin_users)>0&&Session::has('session_user')){
	return redirect('/dashboard');
	}else{
	$errmsg="<span style='color:red'>Wrong username or password</span>";
	return redirect('/adminlogin')->with(['err'=>$errmsg]);
	}
	}
}
