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
        $subject = $slug;
        $lesson = $course;

        return view('lesson', ['subject' => $subject, 'lesson' => $lesson ]);


    }

    public function launch($slug, $course)
    {
        $id = Auth::user()->email;
        $admin = DB::table('users')->where('email', $id)->pluck('is_teacher')->first();
        $subject = $slug;
        $lesson = $course;


        if ($admin >= 0) {
//            return view('lessons/' . $slug . '/' . $course , ['subject' => $subject, 'lesson' => $lesson ]);
            return view('launch_lesson', ['subject' => $subject, 'lesson' => $lesson ]);

        };

        return view('access');
    }
}