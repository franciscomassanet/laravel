<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Charts;

class reports extends Controller
{
    //Used for reporting college wide results
    public function overview(){
        $user = Auth::user()->email;
        $college = Auth::user()->college;

        $teacher = DB::table('users')->where('email', $user)->pluck('is_teacher')->first();

        if ($teacher == 2) {
            $date = \Carbon\Carbon::today()->subDays(30);
            $prevDate = \Carbon\Carbon::today()->subDays(60);

            //duration
            $duration = DB::table('results')->where('Date', '>=', $date)->where('college', $college)->sum('Duration');
            $duration = (round($duration / 60));
            $prevDuration = DB::table('results')->where('Date', '>=', $prevDate)->where('college', $college)->sum('Duration');
            $prevDuration = (round($prevDuration / 60 - $duration));
            $duration_max = (round($duration / 100 * 25 + $duration));

            //total passes
            $pass = DB::table('results')->where('Grade', 'Pass')->where('Date', '>=', $date)->where('college', $college)->count('Grade');
            $prevPass = DB::table('results')->where('Grade', 'Pass')->where('Date', '>=', $prevDate)->where('college', $college)->count('Grade');
            $prevPass = (round($prevPass - $pass));
            $pass_max = (round($pass / 100 * 25 + $pass));

            //total fails
            $fail = DB::table('results')->where('Grade', 'Fail')->where('Date', '>=', $date)->where('college', $college)->count('Grade');
            $prevFail = DB::table('results')->where('Grade', 'Fail')->where('Date', '>=', $prevDate)->where('college', $college)->count('Grade');
            $prevFail = (round($prevFail - $fail));
            $fail_max = (round($fail / 100 * 25 + $fail));


            $totalHours = Charts::create('gauge', 'justgage')
                // Setup the chart settings
                ->values([$duration, 0, $duration_max])
                ->title("Total Hours");

            $totalPass = Charts::create('gauge', 'justgage')
                // Setup the chart settings
                ->values([$pass, 0, $pass_max])
                ->title("Courses Passed");

            $totalFail = Charts::create('gauge', 'justgage')
                // Setup the chart settings
                ->values([$fail, 0, $fail_max])
                ->title("Courses Failed");

            $data = DB::table('results')->where('college', $college)->get();
            $year = Charts::database($data, 'bar', 'highcharts')
                ->title("Number of Courses Taken")
                ->elementLabel("Total")
                ->dimensions(1020, 500)
                ->lastByDay(30, true);

            $totalCourses = DB::table('results')->where('college', $college)->distinct()->orderBy('CourseName', 'ASC')->get(['CourseName']);


            return view('reports.overview', ['college' => $college, 'totalHours' => $totalHours, 'totalPass' => $totalPass, 'totalFail' => $totalFail,
                'prevDuration' => $prevDuration, 'prevPass' => $prevPass, 'prevFail' => $prevFail, 'year' => $year,
                'totalCourses' => $totalCourses
            ]);
        }else {
            return view('access');
        }
    }

    //Used for reporting student results
    public function student($email){
        $date = \Carbon\Carbon::today()->subDays(30);
        $prevDate = \Carbon\Carbon::today()->subDays(60);

        //duration
        $duration = DB::table('results')->where('Date', '>=', $date)->where('Email' , $email)->sum('Duration');
        $duration = (round($duration / 60));
        $prevDuration = DB::table('results')->where('Date', '>=', $prevDate)->where('Email' , $email)->sum('Duration');
        $prevDuration = (round($prevDuration / 60 - $duration));
        $duration_max = (round($duration / 100 * 25 + $duration));

        //total passes
        $pass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevPass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevPass = (round($prevPass - $pass));
        $pass_max = (round($pass / 100 * 25 + $pass));

        //total fails
        $fail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevFail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevFail = (round($prevFail - $fail));
        $fail_max = (round($fail / 100 * 25 + $fail));



        $totalHours = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$duration, 0, $duration_max])
            ->title("Total Hours");

        $totalPass = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$pass, 0, $pass_max])
            ->title("Courses Passed");

        $totalFail = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$fail, 0, $fail_max])
            ->title("Courses Failed");

        $data = DB::table('results')->where('Email' , $email)->get();
        $year = Charts::database($data, 'bar', 'highcharts')
            ->title("Number of Courses Taken")
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            //->lastByMonth(6, true);
            ->lastByDay(30, true);

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user);



        return view('reports.student', ['totalHours' => $totalHours,
            'totalPass' => $totalPass, 'totalFail' => $totalFail,
            'prevDuration' => $prevDuration, 'prevPass' => $prevPass,
            'prevFail' => $prevFail,
            'qrys'=>$qrys, 'user'=>$user, 'email'=>$email,
            'year' => $year]);
    }



    public function resultsBySubject($email){
        $date = \Carbon\Carbon::today()->subDays(30);
        $prevDate = \Carbon\Carbon::today()->subDays(60);

        //duration
        $duration = DB::table('results')->where('Date', '>=', $date)->where('Email' , $email)->sum('Duration');
        $duration = (round($duration / 60));
        $prevDuration = DB::table('results')->where('Date', '>=', $prevDate)->where('Email' , $email)->sum('Duration');
        $prevDuration = (round($prevDuration / 60 - $duration));
        $duration_max = (round($duration / 100 * 25 + $duration));

        //total passes
        $pass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevPass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevPass = (round($prevPass - $pass));
        $pass_max = (round($pass / 100 * 25 + $pass));

        //total fails
        $fail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevFail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevFail = (round($prevFail - $fail));
        $fail_max = (round($fail / 100 * 25 + $fail));



        $totalHours = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$duration, 0, $duration_max])
            ->title("Total Hours");

        $totalPass = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$pass, 0, $pass_max])
            ->title("Courses Passed");

        $totalFail = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$fail, 0, $fail_max])
            ->title("Courses Failed");

        $data = DB::table('results')->where('Email' , $email)->get();
        $year = Charts::database($data, 'bar', 'highcharts')
            ->title("Number of Courses Taken")
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            //->lastByMonth(6, true);
            ->lastByDay(30, true);

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $email)->sortBy('CourseID');



        return view('reports.student', ['totalHours' => $totalHours,
            'totalPass' => $totalPass, 'totalFail' => $totalFail,
            'prevDuration' => $prevDuration, 'prevPass' => $prevPass,
            'prevFail' => $prevFail,
            'qrys'=>$qrys, 'user'=>$user, 'email'=>$email,
            'year' => $year]);
    }

    public function resultsBySubjectDesc($email){
        $date = \Carbon\Carbon::today()->subDays(30);
        $prevDate = \Carbon\Carbon::today()->subDays(60);

        //duration
        $duration = DB::table('results')->where('Date', '>=', $date)->where('Email' , $email)->sum('Duration');
        $duration = (round($duration / 60));
        $prevDuration = DB::table('results')->where('Date', '>=', $prevDate)->where('Email' , $email)->sum('Duration');
        $prevDuration = (round($prevDuration / 60 - $duration));
        $duration_max = (round($duration / 100 * 25 + $duration));

        //total passes
        $pass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevPass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevPass = (round($prevPass - $pass));
        $pass_max = (round($pass / 100 * 25 + $pass));

        //total fails
        $fail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevFail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevFail = (round($prevFail - $fail));
        $fail_max = (round($fail / 100 * 25 + $fail));



        $totalHours = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$duration, 0, $duration_max])
            ->title("Total Hours");

        $totalPass = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$pass, 0, $pass_max])
            ->title("Courses Passed");

        $totalFail = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$fail, 0, $fail_max])
            ->title("Courses Failed");

        $data = DB::table('results')->where('Email' , $email)->get();
        $year = Charts::database($data, 'bar', 'highcharts')
            ->title("Number of Courses Taken")
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            //->lastByMonth(6, true);
            ->lastByDay(30, true);

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortByDesc('CourseID');



        return view('reports.student', ['totalHours' => $totalHours,
            'totalPass' => $totalPass, 'totalFail' => $totalFail,
            'prevDuration' => $prevDuration, 'prevPass' => $prevPass,
            'prevFail' => $prevFail,
            'qrys'=>$qrys, 'user'=>$user, 'email'=>$email,
            'year' => $year]);
    }

    public function resultsByCourse($email){
        $date = \Carbon\Carbon::today()->subDays(30);
        $prevDate = \Carbon\Carbon::today()->subDays(60);

        //duration
        $duration = DB::table('results')->where('Date', '>=', $date)->where('Email' , $email)->sum('Duration');
        $duration = (round($duration / 60));
        $prevDuration = DB::table('results')->where('Date', '>=', $prevDate)->where('Email' , $email)->sum('Duration');
        $prevDuration = (round($prevDuration / 60 - $duration));
        $duration_max = (round($duration / 100 * 25 + $duration));

        //total passes
        $pass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevPass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevPass = (round($prevPass - $pass));
        $pass_max = (round($pass / 100 * 25 + $pass));

        //total fails
        $fail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevFail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevFail = (round($prevFail - $fail));
        $fail_max = (round($fail / 100 * 25 + $fail));



        $totalHours = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$duration, 0, $duration_max])
            ->title("Total Hours");

        $totalPass = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$pass, 0, $pass_max])
            ->title("Courses Passed");

        $totalFail = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$fail, 0, $fail_max])
            ->title("Courses Failed");

        $data = DB::table('results')->where('Email' , $email)->get();
        $year = Charts::database($data, 'bar', 'highcharts')
            ->title("Number of Courses Taken")
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            //->lastByMonth(6, true);
            ->lastByDay(30, true);

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortBy('CourseName');



        return view('reports.student', ['totalHours' => $totalHours,
            'totalPass' => $totalPass, 'totalFail' => $totalFail,
            'prevDuration' => $prevDuration, 'prevPass' => $prevPass,
            'prevFail' => $prevFail,
            'qrys'=>$qrys, 'user'=>$user, 'email'=>$email,
            'year' => $year]);
    }

    public function resultsByCourseDesc($email){
        $date = \Carbon\Carbon::today()->subDays(30);
        $prevDate = \Carbon\Carbon::today()->subDays(60);

        //duration
        $duration = DB::table('results')->where('Date', '>=', $date)->where('Email' , $email)->sum('Duration');
        $duration = (round($duration / 60));
        $prevDuration = DB::table('results')->where('Date', '>=', $prevDate)->where('Email' , $email)->sum('Duration');
        $prevDuration = (round($prevDuration / 60 - $duration));
        $duration_max = (round($duration / 100 * 25 + $duration));

        //total passes
        $pass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevPass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevPass = (round($prevPass - $pass));
        $pass_max = (round($pass / 100 * 25 + $pass));

        //total fails
        $fail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevFail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevFail = (round($prevFail - $fail));
        $fail_max = (round($fail / 100 * 25 + $fail));



        $totalHours = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$duration, 0, $duration_max])
            ->title("Total Hours");

        $totalPass = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$pass, 0, $pass_max])
            ->title("Courses Passed");

        $totalFail = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$fail, 0, $fail_max])
            ->title("Courses Failed");

        $data = DB::table('results')->where('Email' , $email)->get();
        $year = Charts::database($data, 'bar', 'highcharts')
            ->title("Number of Courses Taken")
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            //->lastByMonth(6, true);
            ->lastByDay(30, true);

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortByDesc('CourseName');



        return view('reports.student', ['totalHours' => $totalHours,
            'totalPass' => $totalPass, 'totalFail' => $totalFail,
            'prevDuration' => $prevDuration, 'prevPass' => $prevPass,
            'prevFail' => $prevFail,
            'qrys'=>$qrys, 'user'=>$user, 'email'=>$email,
            'year' => $year]);
    }

    public function resultsByResults($email){
        $date = \Carbon\Carbon::today()->subDays(30);
        $prevDate = \Carbon\Carbon::today()->subDays(60);

        //duration
        $duration = DB::table('results')->where('Date', '>=', $date)->where('Email' , $email)->sum('Duration');
        $duration = (round($duration / 60));
        $prevDuration = DB::table('results')->where('Date', '>=', $prevDate)->where('Email' , $email)->sum('Duration');
        $prevDuration = (round($prevDuration / 60 - $duration));
        $duration_max = (round($duration / 100 * 25 + $duration));

        //total passes
        $pass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevPass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevPass = (round($prevPass - $pass));
        $pass_max = (round($pass / 100 * 25 + $pass));

        //total fails
        $fail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevFail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevFail = (round($prevFail - $fail));
        $fail_max = (round($fail / 100 * 25 + $fail));



        $totalHours = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$duration, 0, $duration_max])
            ->title("Total Hours");

        $totalPass = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$pass, 0, $pass_max])
            ->title("Courses Passed");

        $totalFail = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$fail, 0, $fail_max])
            ->title("Courses Failed");

        $data = DB::table('results')->where('Email' , $email)->get();
        $year = Charts::database($data, 'bar', 'highcharts')
            ->title("Number of Courses Taken")
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            //->lastByMonth(6, true);
            ->lastByDay(30, true);

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortBy('Results');



        return view('reports.student', ['totalHours' => $totalHours,
            'totalPass' => $totalPass, 'totalFail' => $totalFail,
            'prevDuration' => $prevDuration, 'prevPass' => $prevPass,
            'prevFail' => $prevFail,
            'qrys'=>$qrys, 'user'=>$user, 'email'=>$email,
            'year' => $year]);
    }

    public function resultsByResultsDesc($email){
        $date = \Carbon\Carbon::today()->subDays(30);
        $prevDate = \Carbon\Carbon::today()->subDays(60);

        //duration
        $duration = DB::table('results')->where('Date', '>=', $date)->where('Email' , $email)->sum('Duration');
        $duration = (round($duration / 60));
        $prevDuration = DB::table('results')->where('Date', '>=', $prevDate)->where('Email' , $email)->sum('Duration');
        $prevDuration = (round($prevDuration / 60 - $duration));
        $duration_max = (round($duration / 100 * 25 + $duration));

        //total passes
        $pass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevPass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevPass = (round($prevPass - $pass));
        $pass_max = (round($pass / 100 * 25 + $pass));

        //total fails
        $fail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevFail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevFail = (round($prevFail - $fail));
        $fail_max = (round($fail / 100 * 25 + $fail));



        $totalHours = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$duration, 0, $duration_max])
            ->title("Total Hours");

        $totalPass = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$pass, 0, $pass_max])
            ->title("Courses Passed");

        $totalFail = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$fail, 0, $fail_max])
            ->title("Courses Failed");

        $data = DB::table('results')->where('Email' , $email)->get();
        $year = Charts::database($data, 'bar', 'highcharts')
            ->title("Number of Courses Taken")
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            //->lastByMonth(6, true);
            ->lastByDay(30, true);

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortByDesc('Results');



        return view('reports.student', ['totalHours' => $totalHours,
            'totalPass' => $totalPass, 'totalFail' => $totalFail,
            'prevDuration' => $prevDuration, 'prevPass' => $prevPass,
            'prevFail' => $prevFail,
            'qrys'=>$qrys, 'user'=>$user, 'email'=>$email,
            'year' => $year]);
    }

    public function resultsByScore($email){
        $date = \Carbon\Carbon::today()->subDays(30);
        $prevDate = \Carbon\Carbon::today()->subDays(60);

        //duration
        $duration = DB::table('results')->where('Date', '>=', $date)->where('Email' , $email)->sum('Duration');
        $duration = (round($duration / 60));
        $prevDuration = DB::table('results')->where('Date', '>=', $prevDate)->where('Email' , $email)->sum('Duration');
        $prevDuration = (round($prevDuration / 60 - $duration));
        $duration_max = (round($duration / 100 * 25 + $duration));

        //total passes
        $pass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevPass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevPass = (round($prevPass - $pass));
        $pass_max = (round($pass / 100 * 25 + $pass));

        //total fails
        $fail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevFail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevFail = (round($prevFail - $fail));
        $fail_max = (round($fail / 100 * 25 + $fail));



        $totalHours = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$duration, 0, $duration_max])
            ->title("Total Hours");

        $totalPass = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$pass, 0, $pass_max])
            ->title("Courses Passed");

        $totalFail = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$fail, 0, $fail_max])
            ->title("Courses Failed");

        $data = DB::table('results')->where('Email' , $email)->get();
        $year = Charts::database($data, 'bar', 'highcharts')
            ->title("Number of Courses Taken")
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            //->lastByMonth(6, true);
            ->lastByDay(30, true);

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortBy('Grade');



        return view('reports.student', ['totalHours' => $totalHours,
            'totalPass' => $totalPass, 'totalFail' => $totalFail,
            'prevDuration' => $prevDuration, 'prevPass' => $prevPass,
            'prevFail' => $prevFail,
            'qrys'=>$qrys, 'user'=>$user, 'email'=>$email,
            'year' => $year]);
    }

    public function resultsByScoreDesc($email){
        $date = \Carbon\Carbon::today()->subDays(30);
        $prevDate = \Carbon\Carbon::today()->subDays(60);

        //duration
        $duration = DB::table('results')->where('Date', '>=', $date)->where('Email' , $email)->sum('Duration');
        $duration = (round($duration / 60));
        $prevDuration = DB::table('results')->where('Date', '>=', $prevDate)->where('Email' , $email)->sum('Duration');
        $prevDuration = (round($prevDuration / 60 - $duration));
        $duration_max = (round($duration / 100 * 25 + $duration));

        //total passes
        $pass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevPass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevPass = (round($prevPass - $pass));
        $pass_max = (round($pass / 100 * 25 + $pass));

        //total fails
        $fail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevFail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevFail = (round($prevFail - $fail));
        $fail_max = (round($fail / 100 * 25 + $fail));



        $totalHours = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$duration, 0, $duration_max])
            ->title("Total Hours");

        $totalPass = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$pass, 0, $pass_max])
            ->title("Courses Passed");

        $totalFail = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$fail, 0, $fail_max])
            ->title("Courses Failed");

        $data = DB::table('results')->where('Email' , $email)->get();
        $year = Charts::database($data, 'bar', 'highcharts')
            ->title("Number of Courses Taken")
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            //->lastByMonth(6, true);
            ->lastByDay(30, true);

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortByDesc('Grade');



        return view('reports.student', ['totalHours' => $totalHours,
            'totalPass' => $totalPass, 'totalFail' => $totalFail,
            'prevDuration' => $prevDuration, 'prevPass' => $prevPass,
            'prevFail' => $prevFail,
            'qrys'=>$qrys, 'user'=>$user, 'email'=>$email,
            'year' => $year]);
    }

    public function resultsByDuration($email){
        $date = \Carbon\Carbon::today()->subDays(30);
        $prevDate = \Carbon\Carbon::today()->subDays(60);

        //duration
        $duration = DB::table('results')->where('Date', '>=', $date)->where('Email' , $email)->sum('Duration');
        $duration = (round($duration / 60));
        $prevDuration = DB::table('results')->where('Date', '>=', $prevDate)->where('Email' , $email)->sum('Duration');
        $prevDuration = (round($prevDuration / 60 - $duration));
        $duration_max = (round($duration / 100 * 25 + $duration));

        //total passes
        $pass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevPass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevPass = (round($prevPass - $pass));
        $pass_max = (round($pass / 100 * 25 + $pass));

        //total fails
        $fail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevFail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevFail = (round($prevFail - $fail));
        $fail_max = (round($fail / 100 * 25 + $fail));



        $totalHours = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$duration, 0, $duration_max])
            ->title("Total Hours");

        $totalPass = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$pass, 0, $pass_max])
            ->title("Courses Passed");

        $totalFail = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$fail, 0, $fail_max])
            ->title("Courses Failed");

        $data = DB::table('results')->where('Email' , $email)->get();
        $year = Charts::database($data, 'bar', 'highcharts')
            ->title("Number of Courses Taken")
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            //->lastByMonth(6, true);
            ->lastByDay(30, true);

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortBy('Duration');



        return view('reports.student', ['totalHours' => $totalHours,
            'totalPass' => $totalPass, 'totalFail' => $totalFail,
            'prevDuration' => $prevDuration, 'prevPass' => $prevPass,
            'prevFail' => $prevFail,
            'qrys'=>$qrys, 'user'=>$user, 'email'=>$email,
            'year' => $year]);
    }

    public function resultsByDurationDesc($email){
        $date = \Carbon\Carbon::today()->subDays(30);
        $prevDate = \Carbon\Carbon::today()->subDays(60);

        //duration
        $duration = DB::table('results')->where('Date', '>=', $date)->where('Email' , $email)->sum('Duration');
        $duration = (round($duration / 60));
        $prevDuration = DB::table('results')->where('Date', '>=', $prevDate)->where('Email' , $email)->sum('Duration');
        $prevDuration = (round($prevDuration / 60 - $duration));
        $duration_max = (round($duration / 100 * 25 + $duration));

        //total passes
        $pass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevPass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevPass = (round($prevPass - $pass));
        $pass_max = (round($pass / 100 * 25 + $pass));

        //total fails
        $fail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevFail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevFail = (round($prevFail - $fail));
        $fail_max = (round($fail / 100 * 25 + $fail));



        $totalHours = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$duration, 0, $duration_max])
            ->title("Total Hours");

        $totalPass = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$pass, 0, $pass_max])
            ->title("Courses Passed");

        $totalFail = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$fail, 0, $fail_max])
            ->title("Courses Failed");

        $data = DB::table('results')->where('Email' , $email)->get();
        $year = Charts::database($data, 'bar', 'highcharts')
            ->title("Number of Courses Taken")
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            //->lastByMonth(6, true);
            ->lastByDay(30, true);

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortByDesc('Duration');



        return view('reports.student', ['totalHours' => $totalHours,
            'totalPass' => $totalPass, 'totalFail' => $totalFail,
            'prevDuration' => $prevDuration, 'prevPass' => $prevPass,
            'prevFail' => $prevFail,
            'qrys'=>$qrys, 'user'=>$user, 'email'=>$email,
            'year' => $year]);
    }

    public function resultsByDate($email){
        $date = \Carbon\Carbon::today()->subDays(30);
        $prevDate = \Carbon\Carbon::today()->subDays(60);

        //duration
        $duration = DB::table('results')->where('Date', '>=', $date)->where('Email' , $email)->sum('Duration');
        $duration = (round($duration / 60));
        $prevDuration = DB::table('results')->where('Date', '>=', $prevDate)->where('Email' , $email)->sum('Duration');
        $prevDuration = (round($prevDuration / 60 - $duration));
        $duration_max = (round($duration / 100 * 25 + $duration));

        //total passes
        $pass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevPass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevPass = (round($prevPass - $pass));
        $pass_max = (round($pass / 100 * 25 + $pass));

        //total fails
        $fail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevFail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevFail = (round($prevFail - $fail));
        $fail_max = (round($fail / 100 * 25 + $fail));



        $totalHours = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$duration, 0, $duration_max])
            ->title("Total Hours");

        $totalPass = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$pass, 0, $pass_max])
            ->title("Courses Passed");

        $totalFail = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$fail, 0, $fail_max])
            ->title("Courses Failed");

        $data = DB::table('results')->where('Email' , $email)->get();
        $year = Charts::database($data, 'bar', 'highcharts')
            ->title("Number of Courses Taken")
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            //->lastByMonth(6, true);
            ->lastByDay(30, true);

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortBy('Date');



        return view('reports.student', ['totalHours' => $totalHours,
            'totalPass' => $totalPass, 'totalFail' => $totalFail,
            'prevDuration' => $prevDuration, 'prevPass' => $prevPass,
            'prevFail' => $prevFail,
            'qrys'=>$qrys, 'user'=>$user, 'email'=>$email,
            'year' => $year]);
    }

    public function resultsByDateDesc($email){
        $date = \Carbon\Carbon::today()->subDays(30);
        $prevDate = \Carbon\Carbon::today()->subDays(60);

        //duration
        $duration = DB::table('results')->where('Date', '>=', $date)->where('Email' , $email)->sum('Duration');
        $duration = (round($duration / 60));
        $prevDuration = DB::table('results')->where('Date', '>=', $prevDate)->where('Email' , $email)->sum('Duration');
        $prevDuration = (round($prevDuration / 60 - $duration));
        $duration_max = (round($duration / 100 * 25 + $duration));

        //total passes
        $pass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevPass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevPass = (round($prevPass - $pass));
        $pass_max = (round($pass / 100 * 25 + $pass));

        //total fails
        $fail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $date)->where('Email' , $email)->count('Grade');
        $prevFail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $prevDate)->where('Email' , $email)->count('Grade');
        $prevFail = (round($prevFail - $fail));
        $fail_max = (round($fail / 100 * 25 + $fail));



        $totalHours = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$duration, 0, $duration_max])
            ->title("Total Hours");

        $totalPass = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$pass, 0, $pass_max])
            ->title("Courses Passed");

        $totalFail = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$fail, 0, $fail_max])
            ->title("Courses Failed");

        $data = DB::table('results')->where('Email' , $email)->get();
        $year = Charts::database($data, 'bar', 'highcharts')
            ->title("Number of Courses Taken")
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            //->lastByMonth(6, true);
            ->lastByDay(30, true);

        $user = $email;
        $qrys = DB::table('results')
            ->join('users_results', 'users_results.results_id', '=', 'results.id')
            ->join('users', 'users_results.user_id', '=', 'users.id')
            ->get()->where('Email', $user)->sortByDesc('Date');



        return view('reports.student', ['totalHours' => $totalHours,
            'totalPass' => $totalPass, 'totalFail' => $totalFail,
            'prevDuration' => $prevDuration, 'prevPass' => $prevPass,
            'prevFail' => $prevFail,
            'qrys'=>$qrys, 'user'=>$user, 'email'=>$email,
            'year' => $year]);
    }


}
