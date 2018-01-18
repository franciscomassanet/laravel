<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;

class courses extends Controller
{
    //
	
	public function view()
    {
	  $user = DB::table('roles')->where('user_id', Auth::user()->id)->get()->first();
	  $role = $user->role;
	  if($role ==1){
		return view("test");
	  }
	  else{
		return view("test2");
	  }
	  
	  
	  
	}
	
	public function courses($slug)
    {
	  $courses = DB::table('courses')->where('subject', $slug)->get();
	  return view("subject_area/".$slug, ['courses' => $courses]);
	  
	}
	
	public function subjects()
    {
	  $courses = DB::table('subjects')->get();
	  return view("subjects", ['subjects' => $courses]);
	  
	}
}
