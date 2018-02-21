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

        $duration = DB::table('results')->sum('Duration');
        $duration = (round($duration / 60));
        $duration_max = (round($duration / 100 * 25 + $duration));

        $pass = DB::table('results')->where('Grade' , 'Pass')->count('Grade');
        $pass_max = (round($pass / 100 * 25 + $pass));

        $fail = DB::table('results')->where('Grade' , 'Fail')->count('Grade');
        $fail_max = (round($fail / 100 * 25 + $fail));

        $totalHours = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$duration, 0, $duration_max])
            ->responsive(false)
            ->title("Total Hours");

        $totalPass = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$pass, 0, $pass_max])
            ->responsive(false)
            ->title("Courses Passed");

        $totalFail = Charts::create('gauge', 'justgage')
            // Setup the chart settings
            ->values([$fail, 0, $fail_max])
            ->responsive(false)
            ->title("Courses Failed");

        return view('reports.overview', ['totalHours' => $totalHours, 'totalPass' => $totalPass, 'totalFail' => $totalFail]);
    }
}
