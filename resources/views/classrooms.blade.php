@extends('layouts.admin_menu')

<style>
	body {
		background-image: url("img/wallpapers/classroom-wallpaper.jpg");
		background-attachment: fixed;
		background-repeat:no-repeat;
		background-size:cover;
	}

</style>

@section('content')

	<div class="container" style="padding-top: 40px; min-height: 80%; ">
		@if ($errors->any())
			<div class="col-md-8" style="padding: 10px;">
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			</div>
		@endif
		@if(session()->has('message.level'))
			<div class="col-md-8" style="padding: 10px;">
				<div class="alert alert-{{ session('message.level') }}">
					{!! session('message.content') !!}
				</div>
			</div>
		@endif

		<div class="row">

			<div class="col-md-12" >

				<div class="card card-cascade narrower" style="background-color: rgba(255,255,255,0.5); margin-bottom: 20px;">

					<!--Card image-->
					<div class="view gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

						<div>
							<span class='white-text mx-3'><h1>My Classrooms</h1></span>
						</div>

					</div>
					<!--/Card image-->

					<div class="px-4" style="margin-bottom: 40px;">


                                    <?php
									echo "<div class='row d-flex'>";
									foreach ($items AS $item){
									    echo "
											<div class='col-lg-3 col-md-6 mb-r'>
												<div class='card card-cascade narrower'>

													<div class='view overlay hm-white-slight z-depth-1'>
														<img src='/img/icon/google-classroom-banner.png' class='img-fluid'>
													</div>

													<div class='card-body text-center no-padding'>
														<h4 class='card-title'><strong>{$item->name}</strong></h4>
														<h5 class='card-title'>&nbsp;{$item->section}&nbsp;</h5>
														<div class='card-footer'>
															<a href='class/{$item->id}/{$item->name}' class='btn btn-primary'>View</a>
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
					</div>

				</div>
			</div>
		</div>

@endsection
