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
	public function results($email)
    {

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user);


        //dump($view);
        //dump($name);
        return view("studentResults", ['qrys'=>$qrys, 'user'=>$user, 'email'=>$email ]);
	  
	}

    public function resultsBySubject($email)
    {
        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $email)->sortBy('CourseID');

        //dump($user);
        //dump($qrys);
        return view("studentResults", ['qrys'=>$qrys, 'user'=>$user, 'email'=>$email ]);

    }

    public function resultsBySubjectDesc($email)
    {

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortByDesc('CourseID');

        //dump($user);
        //dump($qrys);
        return view("studentResults", ['qrys'=>$qrys, 'user'=>$user, 'email'=>$email ]);

    }

	public function resultsByCourse($email)
    {

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortBy('CourseName');

        //dump($user);
        //dump($qrys);
        return view('studentResults', ['qrys'=>$qrys, 'user'=>$user, 'email'=>$email ]);

    }

    public function resultsByCourseDesc($email)
    {

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortByDesc('CourseName');

        //dump($user);
        //dump($qrys);
        return view('studentResults', ['qrys'=>$qrys, 'user'=>$user, 'email'=>$email ]);

    }

	public function resultsByResults($email)
    {

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortBy('Results');

        //dump($user);
        //dump($qrys);
        return view('studentResults', ['qrys'=>$qrys, 'user'=>$user, 'email'=>$email ]);

    }

    public function resultsByResultsDesc($email)
    {

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortByDesc('Results');

        //dump($user);
        //dump($qrys);
        return view('studentResults', ['qrys'=>$qrys, 'user'=>$user, 'email'=>$email ]);

    }

	public function resultsByScore($email)
    {

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortBy('Grade');

        //dump($user);
        //dump($qrys);
        return view('studentResults', ['qrys'=>$qrys, 'user'=>$user, 'email'=>$email ]);

    }

    public function resultsByScoreDesc($email)
    {

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortByDesc('Grade');

        //dump($user);
        //dump($qrys);
        return view('studentResults', ['qrys'=>$qrys, 'user'=>$user, 'email'=>$email ]);

    }

	public function resultsByDuration($email)
    {

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortBy('Duration');

        //dump($user);
        //dump($qrys);
        return view('studentResults', ['qrys'=>$qrys, 'user'=>$user, 'email'=>$email ]);

    }

    public function resultsByDurationDesc($email)
    {

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortByDesc('Duration');

        //dump($user);
        //dump($qrys);
        return view('studentResults', ['qrys'=>$qrys, 'user'=>$user, 'email'=>$email ]);

    }

    public function resultsByDate($email)
    {

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortBy('Date');

        //dump($user);
        //dump($qrys);
        return view('studentResults', ['qrys'=>$qrys, 'user'=>$user, 'email'=>$email ]);

    }

    public function resultsByDateDesc($email)
    {

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortByDesc('Date');

        //dump($user);
        //dump($qrys);
        return view('studentResults', ['qrys'=>$qrys, 'user'=>$user, 'email'=>$email ]);

    }
}
