<meta property="og:image" content="http://cdn.akc.org/Best-_and-Worst_-Toys-for-Your-Teething-Puppy.jpg" />
@extends('layouts.teacher_menu')

@section('content')


    <!--Main Layout-->
	<style>
		body {
			background-image: url("/img/wallpapers/childcare.jpg");
			background-attachment: fixed;
			background-repeat:no-repeat;
			background-size:cover;
		}
	</style>
    <main>
    
        <div class="container" style="background-color: rgba(255,255,255,0.5); ">
		
                <!-- Card -->
				<div class="card card-image" style="background-image: url(../img/icon/subject-childCare.jpg); margin-top: 80px; margin-bottom:30px; padding:20px;">

					<!-- Content -->
					<div class="text-white text-center  align-items-center rgba-white-strong py-4 px-4">
						<div class="text-center">
							<h1 class="black-text text-center"><strong>Childcare</strong></h1>
						</div>
					</div>
					<!-- Content -->
				</div>
				<!-- Card -->
				
				
				<!-- course level-->
				<div class="row" style="padding: 10px;">
					<div class="col-md-4">
						<!--Card Default-->
						<div class="card mdb-color lighten-2 text-center z-depth-2">
							<div class="card-body">
								<h3 style="color:#ffffff;"><strong><i class="fa fa-flag fa-2x pull-left"></i> Level Three</strong></h3>
							</div>
						</div>
						<!--/.Card Default-->

					</div>
				</div>
				
				<?php
				 echo "<div class='row'>";
				 foreach($courses as $course){
					 
					  if ($course->level == 3){
					 
						 echo "
						 <div class='col-lg-3 col-md-6 mb-r'>
							<div class='card card-cascade narrower'>
								
								<div class='card-body text-center no-padding'>
									<h4 class='card-title'><strong>{$course->name}</strong></h4>
									<p class='card-text'></p>
									<a href='{$course->view_link}' target='_blank'>
									<div class='card-footer'>
										<span class='left'>View Courses <span class='discount'></span></span>
										<span class='right'>{$course->classroom_link}</span>
									</div>
									</a>
								</div>
						 
							</div>
						 </div>
						 ";
					 }else ;
				 };
				 echo "</div>";
				?>

		
		
		
		
		
		
		
		
		
		
		
		</div>
	</main>

 
@endsection