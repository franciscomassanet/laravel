<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Contracts\Auth\Guard;

class studentResults extends Controller
{
    //
	public function results()
    {

        $user = app('Illuminate\Contracts\Auth\Guard')->user()->email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user);

        //dump($user);
        //dump($qrys);
        return view('myResults', ['qrys'=>$qrys, 'user'=>$user ]);
	  
	}

    public function resultsBySubject()
    {

        $user = app('Illuminate\Contracts\Auth\Guard')->user()->email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortBy('CourseID');

        //dump($user);
        //dump($qrys);
        return view('myResults', ['qrys'=>$qrys, 'user'=>$user ]);

    }

    public function resultsBySubjectDesc()
    {

        $user = app('Illuminate\Contracts\Auth\Guard')->user()->email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortByDesc('CourseID');

        //dump($user);
        //dump($qrys);
        return view('myResults', ['qrys'=>$qrys, 'user'=>$user ]);

    }

	public function resultsByCourse()
    {

        $user = app('Illuminate\Contracts\Auth\Guard')->user()->email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortBy('CourseName');

        //dump($user);
        //dump($qrys);
        return view('myResults', ['qrys'=>$qrys, 'user'=>$user ]);

    }

    public function resultsByCourseDesc()
    {

        $user = app('Illuminate\Contracts\Auth\Guard')->user()->email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortByDesc('CourseName');

        //dump($user);
        //dump($qrys);
        return view('myResults', ['qrys'=>$qrys, 'user'=>$user ]);

    }

	public function resultsByResults()
    {

        $user = app('Illuminate\Contracts\Auth\Guard')->user()->email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortBy('Results');

        //dump($user);
        //dump($qrys);
        return view('myResults', ['qrys'=>$qrys, 'user'=>$user ]);

    }

    public function resultsByResultsDesc()
    {

        $user = app('Illuminate\Contracts\Auth\Guard')->user()->email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortByDesc('Results');

        //dump($user);
        //dump($qrys);
        return view('myResults', ['qrys'=>$qrys, 'user'=>$user ]);

    }

	public function resultsByScore()
    {

        $user = app('Illuminate\Contracts\Auth\Guard')->user()->email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortBy('Grade');

        //dump($user);
        //dump($qrys);
        return view('myResults', ['qrys'=>$qrys, 'user'=>$user ]);

    }

    public function resultsByScoreDesc()
    {

        $user = app('Illuminate\Contracts\Auth\Guard')->user()->email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortByDesc('Grade');

        //dump($user);
        //dump($qrys);
        return view('myResults', ['qrys'=>$qrys, 'user'=>$user ]);

    }

	public function resultsByDuration()
    {

        $user = app('Illuminate\Contracts\Auth\Guard')->user()->email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortBy('Duration');

        //dump($user);
        //dump($qrys);
        return view('myResults', ['qrys'=>$qrys, 'user'=>$user ]);

    }

    public function resultsByDurationDesc()
    {

        $user = app('Illuminate\Contracts\Auth\Guard')->user()->email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortByDesc('Duration');

        //dump($user);
        //dump($qrys);
        return view('myResults', ['qrys'=>$qrys, 'user'=>$user ]);

    }

    public function resultsByDate()
    {

        $user = app('Illuminate\Contracts\Auth\Guard')->user()->email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortBy('Date');

        //dump($user);
        //dump($qrys);
        return view('myResults', ['qrys'=>$qrys, 'user'=>$user ]);

    }

    public function resultsByDateDesc()
    {

        $user = app('Illuminate\Contracts\Auth\Guard')->user()->email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortByDesc('Date');

        //dump($user);
        //dump($qrys);
        return view('myResults', ['qrys'=>$qrys, 'user'=>$user ]);

    }
}
