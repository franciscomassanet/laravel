@extends('layouts.student_menu')

@section('content')

	<div class="container" style="background-color: rgba(255,255,255,0.5); ">
		
			<!--Section heading-->
                <div class="intro-info-content text-center" style="margin-top: 80px; padding:10px;">
					<h1 class="display-3 mb-5 wow fadeInDown" data-wow-delay="0.3s">Your Results</h1>
					<hr>
				</div>
		
			
		   <?php
				 
				 $qrys = DB::table('results')
					->join('users_results', 'users_results.results_id', '=', 'results.id')
					->join('users', 'users_results.user_id', '=', 'users.id')
					->get();
					
				echo "<div class='row'>";	
				foreach ($qrys AS $qry){
					
					$user = app('Illuminate\Contracts\Auth\Guard')->user()->id;
					if ($qry->id === $user){
						
						echo "
						<div class='col-lg-3 col-md-6 mb-r'>	 
							<div class='card card-cascade'>
								<div class='view gradient-card-header blue-gradient'>
									<h3 class='h2-responsive'>{$qry->CourseName}</h3>
									<p>Result: {$qry->Grade}</p>
								</div>
								<div class='card-body text-center'>
									<span>Score: {$qry->Results}%</span><br>
									<span>Duration: {$qry->Duration} mins</span><br>
									<span>Date: {$qry->Date}</span>
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
