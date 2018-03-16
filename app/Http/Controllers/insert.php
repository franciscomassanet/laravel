<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Google_Client;


class insert extends Controller
{
   
   public function insert($CourseID, $CourseName, $Results, $Grade, $Email, $Duration)
    {
        $user = app('Illuminate\Contracts\Auth\Guard')->user()->email;
        //$college = DB::table('users')->where('email', $user)->pluck('college')->first();
        $college = Auth::user()->college;

//        if(strpos($user,  '@innov8lcc.co.uk') !== false) {
//
//
//            return view("college_insert.innov8", ['CourseID' => $CourseID, 'CourseName' => $CourseName, 'Results' => $Results, 'Grade' => $Grade, 'Email' => $user, 'college' => $college, 'Duration'=> $Duration]);
//
//
//        }
//
//        if(strpos($user,  '@c-learning.net') !== false) {
//
//
//            return view("college_insert.c-learning", ['CourseID' => $CourseID, 'CourseName' => $CourseName, 'Results' => $Results, 'Grade' => $Grade, 'Email' => $user, 'college' => $college, 'Duration'=> $Duration]);
//
//
//        }

        dump($college);
	    return view("insert", ['CourseID' => $CourseID, 'CourseName' => $CourseName, 'Results' => $Results, 'Grade' => $Grade, 'Email' => $user, 'college' => $college, 'Duration'=> $Duration]);
	}
   
   
   
   
}
