@extends('layouts.student_menu')

@section('content')

	<div class="container" style="background-color: rgba(255,255,255,0.5); ">
		
			<!--Section heading-->
                <div class="intro-info-content text-center" style="margin-top: 80px; padding:10px;">
					<h1 class="display-3 mb-5 wow fadeInDown" data-wow-delay="0.3s">Your Classrooms</h1>
					<hr>
				</div>
		
			
		   <?php
				 
				 $qrys = DB::table('classrooms')
					->join('classrooms_users', 'classrooms_users.classroom_id', '=', 'classrooms.id')
					->join('users', 'classrooms_users.user_id', '=', 'users.id')
					->get();
					
				echo "<div class='row'>";	
				foreach ($qrys AS $qry){
					
					$user = app('Illuminate\Contracts\Auth\Guard')->user()->id;
					if ($qry->id === $user){
						
						echo "
							 <div class='col-lg-3 col-md-6 mb-r'>
								<div class='card card-cascade narrower'>
									
									<div class='view overlay hm-white-slight z-depth-1'>
										<img src='{$qry->classroom_icon}' class='img-fluid'>
										<a>
											<div class='mask'></div>
										</a>
									</div>
									
									<div class='card-body text-center no-padding'>
										<h4 class='card-title'><strong>{$qry->class_name}</strong></h4>
										<p class='card-text'></p>
										<a href='/'>
										<div class='card-footer'>
											<span class='left'>View Courses <span class='discount'></span></span>
											<span class='right'><i class='fa fa-arrow-circle-right fa-2x' aria-hidden='true' style='color: #7283A7;'></i></span>
										</div>
										</a>
									</div>
							 
								</div>
							 </div>
						";
					};
				};
				echo "</div>";
			?>
			
	</div>


@endsection
