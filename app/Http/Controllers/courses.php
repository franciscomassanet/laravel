<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Auth;



class courses extends Controller
{
    //
	
	public function view()
    {

	}
	
	public function courses($slug)
    {
        $id = Auth::user()->email;
        $admin = DB::table('users')->where('email', $id)->pluck('is_teacher')->first();

        if ($admin >= 1) {
            $courses = DB::table('courses')->where('subject', $slug)->get();
            return view("subject_area/" . $slug, ['courses' => $courses]);
        };

        return view('access');
	  
	}
	
	public function subjects()
    {
        $id = Auth::user()->email;
        $admin = DB::table('users')->where('email', $id)->pluck('is_teacher')->first();

        if ($admin >= 1) {
            $courses = DB::table('subjects')->get();
            return view("subjects", ['subjects' => $courses]);
        };

        return view('access');

	}
}
