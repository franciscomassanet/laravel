<?php
DB::table('results')->insert( 
	['CourseID' => $CourseID, 'CourseName' => $CourseName, 'Results'=>$Results, 'Grade'=>$Grade , 'Email'=>$Email, 'Duration'=>$Duration, 'Date'=>NOW()]	
);
?>