<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class contents extends Controller
{
    //
	
	public function index($slug, $course)
    {
		return view('lessons/'.$slug.'/'.$course);
    }
}