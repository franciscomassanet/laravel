<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Auth;

class contents extends Controller
{
    //
	
	public function index($slug, $course)
    {
        $id = Auth::user()->email;
        $admin = DB::table('users')->where('email', $id)->pluck('is_teacher')->first();

        if ($admin >= 0) {
            return view('lessons/' . $slug . '/' . $course);
        };

        return view('access');
    }
}