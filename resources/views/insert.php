<?php
DB::table('results')->insert( 
	['CourseID' => $CourseID, 'CourseName' => $CourseName, 'Results'=>$Results, 'Grade'=>$Grade , 'Email'=>$Email, 'Duration'=>$Duration, 'Date'=>NOW(), 'created_at'=>NOW()]
);

$id = DB::table('results')->orderBy('id', 'desc')->first();
$user = app('Illuminate\Contracts\Auth\Guard')->user()->id;

DB::table('users_results')->insert(
    ['user_id' => $user, 'results_id' => $id->id]
);
?>