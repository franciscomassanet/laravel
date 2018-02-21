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
    //
    public function overview(){
        $date = \Carbon\Carbon::today()->subDays(30);
        $prevDate = \Carbon\Carbon::today()->subDays(60);

        //duration
        $duration = DB::table('results')->where('Date', '>=', $date)->sum('Duration');
        $duration = (round($duration / 60));
        $prevDuration = DB::table('results')->where('Date', '>=', $prevDate)->sum('Duration');
        $prevDuration = (round($prevDuration / 60 - $duration));
        $duration_max = (round($duration / 100 * 25 + $duration));

        //total passes
        $pass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $date)->count('Grade');
        $prevPass = DB::table('results')->where('Grade' , 'Pass')->where('Date', '>=', $prevDate)->count('Grade');
        $prevPass = (round($prevPass - $pass));
        $pass_max = (round($pass / 100 * 25 + $pass));

        //total fails
        $fail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $date)->count('Grade');
        $prevFail = DB::table('results')->where('Grade' , 'Fail')->where('Date', '>=', $prevDate)->count('Grade');
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

        $data = DB::table('results')->get();
        $year = Charts::database($data, 'bar', 'highcharts')
            ->title("Number of Courses Taken")
            ->elementLabel("Total")
            ->dimensions(1000, 500)
            //->lastByMonth(6, true);
            ->lastByDay(31, true);



        return view('reports.overview', ['totalHours' => $totalHours, 'totalPass' => $totalPass, 'totalFail' => $totalFail, 'prevDuration' => $prevDuration, 'prevPass' => $prevPass, 'prevFail' => $prevFail, 'year' => $year]);
    }


}
