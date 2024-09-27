<?php

namespace App\Http\Controllers\Auth;

use App\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use Session;


class AdminRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

   // use RegistersUsers;
	//use Notifiable;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
   // protected $redirectTo = '/';
	//protected $guard = 'admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 /*
	    public function __construct()
    {
        $this->middleware('auth:admin');
    }
	*/
	
	



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create(Request $request)
	
    {
		
		
		/*$name= $request->name;
		echo $name;
		/*
		
		 return Validator::make($dt, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'mobile'  =>  'required|min:10|max:10|string|unique:users',
            
        ]);
		*/
/*
        return User::create([
            'name' => $dt['name'],
            'email' => $dt['email'],
            'password' => bcrypt($dt['password']),
            'mobile'=>$dt['mobile'],
           
        ]);

  */ 
  
  $admin_details = new admin;
  $admin_details->name = $request->name;  
  $admin_details->email = $request->email; 
  $admin_details->password = $request->password; 
  $admin_details->mobile = $request->mobile; 
    
       
    
    
  if($admin_details->save()){
	  $msg="Successfully Registered";
	  return redirect('/adminregister')->with(['adminmsg'=>$msg]);
  }
        

    }
}
