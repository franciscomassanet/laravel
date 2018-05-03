@extends('layouts.teacher_menu')

@section('content')


    <!--Main Layout-->
	<style>
		body {
			background-image: url("img/wallpapers/launch.png");
			background-attachment: fixed;
			background-repeat:no-repeat;
			background-size:cover;
		}
	</style>
    <main>
    
        <div class="container" style="background-color: rgba(255,255,255,0.5); ">
		
			<!--Section heading-->
                <div class="intro-info-content text-center" style="margin-top: 80px; padding:10px;">
					<h1 class="display-3 mb-5 wow fadeInDown" data-wow-delay="0.3s">Subject Areas</h1>
					<hr>
				</div>
				
				
				<?php
				 echo "<div class='row'>";
				 foreach($subjects as $subject){
					 
					 echo "
					 <div class='col-lg-3 col-md-6 mb-r'>
                        <div class='card card-cascade narrower'>
                            
							<div class='view overlay hm-white-slight z-depth-1'>
                                <img src='{$subject->subject_icon}' class='img-fluid'>
                                <a>
                                    <div class='mask'></div>
                                </a>
                            </div>
							
                            <div class='card-body text-center no-padding'>
                                <h4 class='card-title'><strong>{$subject->subject}</strong></h4>
                                <p class='card-text'></p>
                                <a href='/{$subject->view_link}'>
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
				 echo "</div>";
				?>

		
		
		
		
		
		
		
		
		
		
		
		</div>
	</main>

 
@endsection