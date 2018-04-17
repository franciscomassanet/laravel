@extends('layouts.super_admin_menu')

@section('content')


    <!--Main Layout-->
	<style>
		body {
			background-image: url("/img/wallpapers/esafety.jpg");
			background-attachment: fixed;
			background-repeat:no-repeat;
			background-size:cover;
		}
	</style>
    <main>
    
        <div class="container" style="background-color: rgba(255,255,255,0.5); ">
		
                <!-- Card -->
				<div class="card card-image" style="background-image: url(../img/icon/subject-esafety2.jpg); margin-top: 80px; margin-bottom:30px; padding:20px;">

					<!-- Content -->
					<div class="text-white text-center  align-items-center rgba-white-strong py-4 px-4">
						<div class="text-center">
							<h1 class="black-text text-center"><strong>E-Safety</strong></h1>
						</div>
					</div>
					<!-- Content -->
				</div>
				<!-- Card -->



				<?php
				echo "<div class='row d-flex'>";
				foreach($courses as $course){

					if ($course->level == 1){

						echo "
						 <div class='col-lg-3 col-md-6 mb-r d-flex'>
							<div class='card card-cascade narrower d-flex'>

								<div class='card-body text-center no-padding'>
									<h4 class='card-title'><strong>{$course->title}</strong></h4>
									<p class='card-text'></p>
									<a href='{$course->url}' target='_blank'>
									<div class='card-footer'>
										<span class='left'>View Courses <span class='discount'></span></span>
										<span class='right'><g:sharetoclassroom url='{$course->url}' thumbnailUrl='{$course->thumbnailUrl}' size='32' title='{$course->title}' body='{$course->body}'></g:sharetoclassroom></span>
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