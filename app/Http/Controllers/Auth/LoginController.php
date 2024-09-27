<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
//use Illuminate\Http\Request;
use Request;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        Session::put('logged_user','1');
        
        /*
        Session::put('logged_user_email',Request::input('email'));
        $register_user_email=Session::get('register_user_email');
        $logged_user_email=Session::get('logged_user_email');
        if($register_user_email!=$logged_user_email){
            Session::put('user_email',$logged_user_email);
        }
        */
    

      //  Session::put('logged_email',$request->get('email'));
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request) {
         Session::forget('logged_user');
  Auth::logout();

  return redirect('/');
}
}
