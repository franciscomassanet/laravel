<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;	


class insert extends Controller
{
   
   public function insert($CourseID, $CourseName, $Results, $Grade, $Email, $Duration)
    {
	  $user = app('Illuminate\Contracts\Auth\Guard')->user()->email;
	  return view("insert", ['CourseID' => $CourseID, 'CourseName' => $CourseName, 'Results' => $Results, 'Grade' => $Grade, 'Email' => $user, 'Duration'=> $Duration]);
	}
   
   
   
   
}
