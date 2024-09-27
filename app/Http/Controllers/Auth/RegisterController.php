<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use Session;


class RegisterController extends Controller
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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'mobile'  =>  'required|min:10|max:10|string|unique:users',
             'pincode' => 'required|string',
              'address' => 'required|string',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $dt)
    {
        $fname=$dt['name'];
        $email=$dt['email'];

        
         $user = array('name'=>$fname,'email'=>$email);
/*
        Mail::send(['text'=>'mail'], $data, function ($message)
        {
          echo $data['em'];
          die();
          $emails = [$email, 'arijitjana490@gmail.com'];
            $message->from('no-reply@yourdomain.com', 'Ecommerce admin');
//            $message->to( $request->input('email') );
            $message->to( $emails);
            //Add a subject
            $message->subject("Registration Successful");
        });
        */
       Mail::send('mail', $user, function($message) use ($user) {
            $message->to($user['email']);
            $message->subject('Registration Successful');
        });


        // Session::put('register_user_email',$dt['email']);
        return User::create([
            'name' => $dt['name'],
            'email' => $dt['email'],
            'password' => bcrypt($dt['password']),
            'mobile'=>$dt['mobile'],
            'pincode'=>$dt['pincode'],
            'address'=>$dt['address'],
        ]);

   
        

    }
	
	
}
