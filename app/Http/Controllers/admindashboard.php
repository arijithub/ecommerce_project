<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class admindashboard extends Controller
{
   public function dashboard_page_show(){
    if(Session::has('session_user')){
    return view('dashboard.admindashboard');
	  }
	  else{
	  return redirect('/adminlogin');
	  }
	}
	
	public function logout_func(){
	
	Session::flush();
	return redirect('/login');
	}
}
