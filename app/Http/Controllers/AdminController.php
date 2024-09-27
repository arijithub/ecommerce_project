<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notifiable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 protected $guard='admin';
	 
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }
}
