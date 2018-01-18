
@extends('layouts.admin_menu')

@section('content')


    <!--Main Layout-->
    <main>
    
        <div class="container" style="background-color: rgba(255,255,255,0.5); ">
		
		
				
				
				<?php
				
				 $pass = DB::table('courses')->where('level', 2)->count();
				 echo "<h1>$pass</h1>";
				 
				
		
				?>
		</div>
	</main>

 
@endsection
