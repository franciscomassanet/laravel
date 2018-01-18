<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		  $role = app('Illuminate\Contracts\Auth\Guard')->user()->is_teacher;
		  
		  if($role ===1){
			return view("adminHome");
		  }
		  else{
			 return view('home');
		  }
    }
}
