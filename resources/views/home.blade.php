<?php
    $id = Auth::user()->email;
    $admin = DB::table('users')->where('email', $id)->pluck('is_teacher')->first();
?>


@if($admin >= 2 )
    //Admin menu
    @extends ('layouts.admin_menu')
@endif

@if ($admin >= 1 )
    // Teacher menu
    @extends('layouts.teacher_menu')
@else
    // Student menu
    @extends ('layouts.student_menu')
@endif




@section('content')
<head>

	<style>
		body {
				background-image: url("/img/banners/E-learning.jpg");
				background-attachment: fixed;
				background-repeat:no-repeat;
				background-size:cover;
			}
	</style>

</head>

 <!--Main Layout-->
    <main>
    
        <div class="container" style="background-color: rgba(255,255,255,0.5); ">
            
            
            <!--Section: Products v.3-->
            <section class="section pb-3 wow fadeIn" data-wow-delay="0.3s">
				
				<!-- Intro Section -->
				<div class="view hm-white-light jarallax" style="margin-top: 0px; padding:0px;" data-jarallax='{"speed": 0.2}'>
					<div class="" >
						<div class="container flex-center">
							<div class="row pt-5 mt-3">
								<div class="col-md-12 mb-3">
									<div class="intro-info-content text-center">
										<div align="center">
											<img src="img/banners/BLC-banner-purple.jpg" class="img-fluid" alt="" style="">
										</div>
										<hr>
										<h1 class="display-3 mb-5 wow fadeInDown" data-wow-delay="0.3s">Blended Learning Consortium</h1>
										<h1 class="display-3 font-up mb-5 mt-1 font-bold wow fadeInDown" data-wow-delay="0.5s"><a class="indigo-text font-bold">G-Suite Edition</a></h1>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                <!--Section heading-->
                <h1 class="section-heading h1 pt-4">Most Popular Courses</h1>
                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-r">

                        <!--Card-->
                        <div class="card card-cascade narrower">

                            <!--Card image-->
                            <div class="view overlay hm-white-slight z-depth-1">
                                <img src="img/icon/subject-travelTourism.jpg" class="img-fluid" alt="" style="">
                                <a>
                                    <div class="mask"></div>
                                </a>
                            </div>
                            <!--Card image-->

                            <!--Card content-->
                            <div class="card-body text-center no-padding">
                                <!--Category & Title-->
                                <a href="" class="text-muted"><h5>Travel & Tourism</h5></a>
                                <h4 class="card-title"><strong><a href="">Aviation<br>Grooming</a></strong></h4>

                                <!--Description-->
                                <p class="card-text">
                                </p>

                                <!--Card footer-->
                                <div class="card-footer">
                                    <span class="left">Add to a Class <span class="discount"></span></span>
                                    <span class="right"><g:sharetoclassroom url="https://aviation-grooming-181709.appspot.com/" size="32" title="Aviation Grooming" body="Work through this interactive content completing all sections"></g:sharetoclassroom></span>
                                </div>

                            </div>
                            <!--Card content-->

                        </div>
                        <!--Card-->

                    </div>
                    <!--Grid column-->
					
					<!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-r">

                        <!--Card-->
                        <div class="card card-cascade narrower">

                            <!--Card image-->
                            <div class="view overlay hm-white-slight z-depth-1">
                                <img src="img/icon/subject-childCare.jpg" class="img-fluid" alt="" style="">
                                <a>
                                    <div class="mask"></div>
                                </a>
                            </div>
                            <!--Card image-->

                            <!--Card content-->
                            <div class="card-body text-center no-padding">
                                <!--Category & Title-->
                                <a href="Subject/childcare.html" class="text-muted"><h5>Childcare</h5></a>
                                <h4 class="card-title"><strong><a href="">Conception<br>to Birth</a></strong></h4>

                                <!--Description-->
                                <p class="card-text">
                                </p>

                                <!--Card footer-->
                                <div class="card-footer">
                                    <span class="left">Add to a Class <span class="discount"></span></span>
                                    <span class="right"><g:sharetoclassroom url="http://url-to-share" size="32" title="Aviation Grooming" body="Work through this interactive content completing all sections"></g:sharetoclassroom></span>
                                </div>

                            </div>
                            <!--Card content-->

                        </div>
                        <!--Card-->

                    </div>
                    <!--Grid column-->
					
					<!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-r">

                        <!--Card-->
                        <div class="card card-cascade narrower">

                            <!--Card image-->
                            <div class="view overlay hm-white-slight z-depth-1">
                                <img src="img/icon/subject-sport.jpg" class="img-fluid" alt="" style="">
                                <a>
                                    <div class="mask"></div>
                                </a>
                            </div>
                            <!--Card image-->

                            <!--Card content-->
                            <div class="card-body text-center no-padding">
                                <!--Category & Title-->
                                <a href="Subject/sport.html" class="text-muted"><h5>Sports</h5></a>
                                <h4 class="card-title"><strong><a href="">Types of<br>Training</a></strong></h4>

                                <!--Description-->
                                <p class="card-text">
                                </p>

                                <!--Card footer-->
                                <div class="card-footer">
                                    <span class="left">Add to a Class <span class="discount"></span></span>
                                    <span class="right"><g:sharetoclassroom url="http://url-to-share" size="32" title="Aviation Grooming" body="Work through this interactive content completing all sections"></g:sharetoclassroom></span>
                                </div>

                            </div>
                            <!--Card content-->

                        </div>
                        <!--Card-->

                    </div>
                    <!--Grid column-->
					
					<!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-r">

                        <!--Card-->
                        <div class="card card-cascade narrower">

                            <!--Card image-->
                            <div class="view overlay hm-white-slight z-depth-1">
                                <img src="img/icon/subject-digitalLiteracy.jpg" class="img-fluid" alt="" style="">
                                <a>
                                    <div class="mask"></div>
                                </a>
                            </div>
                            <!--Card image-->

                            <!--Card content-->
                            <div class="card-body text-center no-padding">
                                <!--Category & Title-->
                                <a href="" class="text-muted"><h5>Digital Literacy</h5></a>
                                <h4 class="card-title"><strong><a href="">Your Digital Footprint</a></strong></h4>

                                <!--Description-->
                                <p class="card-text">
                                </p>

                                <!--Card footer-->
                                <div class="card-footer">
                                    <span class="left">Add to a Class <span class="discount"></span></span>
                                    <span class="right"><g:sharetoclassroom url="http://url-to-share" size="32" title="Aviation Grooming" body="Work through this interactive content completing all sections"></g:sharetoclassroom></span>
                                </div>

                            </div>
                            <!--Card content-->

                        </div>
                        <!--Card-->

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->
                
            </section>
            <!--Section: Products v.3-->
            
            <hr class="mb-5 mt-4">
               
            <!--Section: Products v.5-->
            <section class="section pb-3 wow fadeIn" data-wow-delay="0.3s">

                <!--Section heading-->
                <h1 class="section-heading h1 pt-4">New Courses</h1>
                <!--Carousel Wrapper-->
                <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                    <!--Controls-->
                    <div class="controls-top">
                        <a class="btn-floating primary-color" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                        <a class="btn-floating primary-color" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                    </div>
                    <!--Controls-->

                    <!--Indicators-->
                    <ol class="carousel-indicators">
                        <li class="primary-color" data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                        <li class="primary-color" data-target="#multi-item-example" data-slide-to="1"></li>
                        <li class="primary-color" data-target="#multi-item-example" data-slide-to="2"></li>
                    </ol>
                    <!--Indicators-->

                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">

                        <!--First slide-->
                        <div class="carousel-item active">

                            <div class="col-md-4 clearfix d-none d-sm-block">

                                <!--Card-->
                                <div class="card card-cascade narrower">

									<!--Card image-->
									<div class="view overlay hm-white-slight z-depth-1">
										<img src="img/icon/subject-travelTourism.jpg" class="img-fluid" alt="" style="">
										<a>
											<div class="mask"></div>
										</a>
									</div>
									<!--Card image-->

									<!--Card content-->
									<div class="card-body text-center no-padding">
										<!--Category & Title-->
										<a href="" class="text-muted"><h5>Travel & Tourism</h5></a>
										<h4 class="card-title"><strong><a href="">Aviation Grooming</a></strong></h4>

										<!--Description-->
										<p class="card-text">
										</p>

										<!--Card footer-->
										<div class="card-footer">
											<span class="left">Add to a Class <span class="discount"></span></span>
											<span class="right"><g:sharetoclassroom url="http://url-to-share" size="32" title="Aviation Grooming" body="Work through this interactive content completing all sections"></g:sharetoclassroom></span>
										</div>

									</div>
									<!--Card content-->

								</div>
                                <!--Card-->

                            </div>

                            <div class="col-md-4 clearfix d-none d-sm-block">

                                <!--Card-->
                                <div class="card card-cascade narrower">

                                    <!--Card image-->
                                    <div class="view overlay hm-white-slight z-depth-1">
                                        <img src="img/icon/subject-digitalLiteracy.jpg" class="img-fluid" alt="" style="">
                                        <a>
                                            <div class="mask"></div>
                                        </a>
                                    </div>
                                    <!--Card image-->

                                    <!--Card content-->
                                    <div class="card-body text-center no-padding">
                                        <!--Category & Title-->
                                        <a href="" class="text-muted"><h5>Digital Literacy</h5></a>
                                        <h4 class="card-title"><strong><a href="">Your Digital Footprint</a></strong></h4>

                                        <!--Description-->
                                        <p class="card-text">
                                        </p>

                                        <!--Card footer-->
                                        <div class="card-footer">
                                            <span class="left">Add to a Class <span class="discount"></span></span>
                                            <span class="right"><g:sharetoclassroom url="http://url-to-share" size="32" title="Aviation Grooming" body="Work through this interactive content completing all sections"></g:sharetoclassroom></span>
                                        </div>

                                    </div>
                                    <!--Card content-->

                                </div>
                                <!--Card-->

                            </div>

                            <div class="col-md-4 clearfix d-none d-sm-block">

                                <!--Card-->
                                <div class="card card-cascade narrower">

                                    <!--Card image-->
                                    <div class="view overlay hm-white-slight z-depth-1">
                                        <img src="img/icon/subject-childCare.jpg" class="img-fluid" alt="" style="">
                                        <a>
                                            <div class="mask"></div>
                                        </a>
                                    </div>
                                    <!--Card image-->

                                    <!--Card content-->
                                    <div class="card-body text-center no-padding">
                                        <!--Category & Title-->
                                        <a href="Subject/childcare.html" class="text-muted"><h5>Childcare</h5></a>
                                        <h4 class="card-title"><strong><a href="">Conception to Birth</a></strong></h4>

                                        <!--Description-->
                                        <p class="card-text">
                                        </p>

                                        <!--Card footer-->
                                        <div class="card-footer">
                                            <span class="left">Add to a Class <span class="discount"></span></span>
                                            <span class="right"><g:sharetoclassroom url="http://url-to-share" size="32" title="Aviation Grooming" body="Work through this interactive content completing all sections"></g:sharetoclassroom></span>
                                        </div>

                                    </div>
                                    <!--Card content-->

                                </div>
                                <!--Card-->

                            </div>


                        </div>
                        <!--First slide-->

                        <!--Second slide-->
                        <div class="carousel-item">

                            <div class="col-md-4 clearfix d-none d-sm-block">

                                <!--Card-->
                                <div class="card card-cascade narrower">

                                    <!--Card image-->
                                    <div class="view overlay hm-white-slight z-depth-1">
                                        <img src="img/icon/subject-travelTourism.jpg" class="img-fluid" alt="" style="">
                                        <a>
                                            <div class="mask"></div>
                                        </a>
                                    </div>
                                    <!--Card image-->

                                    <!--Card content-->
                                    <div class="card-body text-center no-padding">
                                        <!--Category & Title-->
                                        <a href="" class="text-muted"><h5>Travel & Tourism</h5></a>
                                        <h4 class="card-title"><strong><a href="">Aviation Grooming</a></strong></h4>

                                        <!--Description-->
                                        <p class="card-text">
                                        </p>

                                        <!--Card footer-->
                                        <div class="card-footer">
                                            <span class="left">Add to a Class <span class="discount"></span></span>
                                            <span class="right"><g:sharetoclassroom url="http://url-to-share" size="32" title="Aviation Grooming" body="Work through this interactive content completing all sections"></g:sharetoclassroom></span>
                                        </div>

                                    </div>
                                    <!--Card content-->

                                </div>
                                <!--Card-->

                            </div>

                            <div class="col-md-4 clearfix d-none d-sm-block">

                                <!--Card-->
                                <div class="card card-cascade narrower">

                                    <!--Card image-->
                                    <div class="view overlay hm-white-slight z-depth-1">
                                        <img src="img/icon/subject-digitalLiteracy.jpg" class="img-fluid" alt="" style="">
                                        <a>
                                            <div class="mask"></div>
                                        </a>
                                    </div>
                                    <!--Card image-->

                                    <!--Card content-->
                                    <div class="card-body text-center no-padding">
                                        <!--Category & Title-->
                                        <a href="" class="text-muted"><h5>Digital Literacy</h5></a>
                                        <h4 class="card-title"><strong><a href="">Your Digital Footprint</a></strong></h4>

                                        <!--Description-->
                                        <p class="card-text">
                                        </p>

                                        <!--Card footer-->
                                        <div class="card-footer">
                                            <span class="left">Add to a Class <span class="discount"></span></span>
                                            <span class="right"><g:sharetoclassroom url="http://url-to-share" size="32" title="Aviation Grooming" body="Work through this interactive content completing all sections"></g:sharetoclassroom></span>
                                        </div>

                                    </div>
                                    <!--Card content-->

                                </div>
                                <!--Card-->

                            </div>

                            <div class="col-md-4 clearfix d-none d-sm-block">

                                <!--Card-->
                                <div class="card card-cascade narrower">

                                    <!--Card image-->
                                    <div class="view overlay hm-white-slight z-depth-1">
                                        <img src="img/icon/subject-childCare.jpg" class="img-fluid" alt="" style="">
                                        <a>
                                            <div class="mask"></div>
                                        </a>
                                    </div>
                                    <!--Card image-->

                                    <!--Card content-->
                                    <div class="card-body text-center no-padding">
                                        <!--Category & Title-->
                                        <a href="Subject/childcare.html" class="text-muted"><h5>Childcare</h5></a>
                                        <h4 class="card-title"><strong><a href="">Conception to Birth</a></strong></h4>

                                        <!--Description-->
                                        <p class="card-text">
                                        </p>

                                        <!--Card footer-->
                                        <div class="card-footer">
                                            <span class="left">Add to a Class <span class="discount"></span></span>
                                            <span class="right"><g:sharetoclassroom url="http://url-to-share" size="32" title="Aviation Grooming" body="Work through this interactive content completing all sections"></g:sharetoclassroom></span>
                                        </div>

                                    </div>
                                    <!--Card content-->

                                </div>
                                <!--Card-->

                            </div>


                        </div>
                        <!--Second slide-->

                        <!--Third slide-->
                        <div class="carousel-item">

                            <div class="col-md-4 clearfix d-none d-sm-block">

                                <!--Card-->
                                <div class="card card-cascade narrower">

                                    <!--Card image-->
                                    <div class="view overlay hm-white-slight z-depth-1">
                                        <img src="img/icon/subject-travelTourism.jpg" class="img-fluid" alt="" style="">
                                        <a>
                                            <div class="mask"></div>
                                        </a>
                                    </div>
                                    <!--Card image-->

                                    <!--Card content-->
                                    <div class="card-body text-center no-padding">
                                        <!--Category & Title-->
                                        <a href="" class="text-muted"><h5>Travel & Tourism</h5></a>
                                        <h4 class="card-title"><strong><a href="">Aviation Grooming</a></strong></h4>

                                        <!--Description-->
                                        <p class="card-text">
                                        </p>

                                        <!--Card footer-->
                                        <div class="card-footer">
                                            <span class="left">Add to a Class <span class="discount"></span></span>
                                            <span class="right"><g:sharetoclassroom url="http://url-to-share" size="32" title="Aviation Grooming" body="Work through this interactive content completing all sections"></g:sharetoclassroom></span>
                                        </div>

                                    </div>
                                    <!--Card content-->

                                </div>
                                <!--Card-->

                            </div>

                            <div class="col-md-4 clearfix d-none d-sm-block">

                                <!--Card-->
                                <div class="card card-cascade narrower">

                                    <!--Card image-->
                                    <div class="view overlay hm-white-slight z-depth-1">
                                        <img src="img/icon/subject-digitalLiteracy.jpg" class="img-fluid" alt="" style="">
                                        <a>
                                            <div class="mask"></div>
                                        </a>
                                    </div>
                                    <!--Card image-->

                                    <!--Card content-->
                                    <div class="card-body text-center no-padding">
                                        <!--Category & Title-->
                                        <a href="" class="text-muted"><h5>Digital Literacy</h5></a>
                                        <h4 class="card-title"><strong><a href="">Your Digital Footprint</a></strong></h4>

                                        <!--Description-->
                                        <p class="card-text">
                                        </p>

                                        <!--Card footer-->
                                        <div class="card-footer">
                                            <span class="left">Add to a Class <span class="discount"></span></span>
                                            <span class="right"><g:sharetoclassroom url="http://url-to-share" size="32" title="Aviation Grooming" body="Work through this interactive content completing all sections"></g:sharetoclassroom></span>
                                        </div>

                                    </div>
                                    <!--Card content-->

                                </div>
                                <!--Card-->

                            </div>

                            <div class="col-md-4 clearfix d-none d-sm-block">

                                <!--Card-->
                                <div class="card card-cascade narrower">

                                    <!--Card image-->
                                    <div class="view overlay hm-white-slight z-depth-1">
                                        <img src="img/icon/subject-childCare.jpg" class="img-fluid" alt="" style="">
                                        <a>
                                            <div class="mask"></div>
                                        </a>
                                    </div>
                                    <!--Card image-->

                                    <!--Card content-->
                                    <div class="card-body text-center no-padding">
                                        <!--Category & Title-->
                                        <a href="Subject/childcare.html" class="text-muted"><h5>Childcare</h5></a>
                                        <h4 class="card-title"><strong><a href="">Conception to Birth</a></strong></h4>

                                        <!--Description-->
                                        <p class="card-text">
                                        </p>

                                        <!--Card footer-->
                                        <div class="card-footer">
                                            <span class="left">Add to a Class <span class="discount"></span></span>
                                            <span class="right"><g:sharetoclassroom url="http://url-to-share" size="32" title="Aviation Grooming" body="Work through this interactive content completing all sections"></g:sharetoclassroom></span>
                                        </div>

                                    </div>
                                    <!--Card content-->

                                </div>
                                <!--Card-->

                            </div>


                        </div>
                        <!--Third slide-->

                    </div>
                    <!--Slides-->

                </div>
                <!--Carousel Wrapper-->

            </section>
            <!--Section: Products v.5-->
            
            
        </div>
           
        
            

        </div>
    
    </main>
    <!--Main Layout-->
@endsection
