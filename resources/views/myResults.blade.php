@extends('layouts.admin_menu')

@section('content')


	<style>
		.table-wrapper {
			display: block;
			overflow-y: auto;
			-ms-overflow-style: -ms-autohiding-scrollbar;
		}

		body {
			background-image: url("/img/wallpapers/topBanner.jpg");
			background-attachment: fixed;
			background-repeat:no-repeat;
			background-size:cover;
		}

	</style>

	<body>
	<div class="container" style="background-color: rgba(255,255,255,0.8); padding-top: 40px; min-height: 80%; ">
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


				<div class="card card-cascade narrower">

		<!--Card image-->
		<div class="view gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

			<div>
			</div>
            <?php
            $user = app('Illuminate\Contracts\Auth\Guard')->user()->name;
            echo "<span class='white-text mx-3'><h1>Course Results for {$user}</h1></span>"
            ?>
			<div>
			</div>

		</div>
		<!--/Card image-->

		<div class="px-4">

			<div class="table-wrapper">
				<!--Table-->
				<table class="table table-hover mb-0" >

					<!--Table head-->
					<thead align="center">
					<tr>
						<th class="th-lg" style="font-weight: bold;">Subject&nbsp;&nbsp;<a href="/resultsOrderSubjectDesc"><i class="fas fa-sort-amount-down fa-sm"></i></a>&nbsp;&nbsp;&nbsp;<a href="/resultsOrderSubject"><i class="fas fa-sort-amount-up fa-sm"></i></a></th>
						<th class="th-lg" style="font-weight: bold;">Course&nbsp;&nbsp;<a href="/resultsOrderCourseDesc"><i class="fas fa-sort-amount-down fa-sm"></i></a>&nbsp;&nbsp;&nbsp;<a href="/resultsOrderCourse"><i class="fas fa-sort-amount-up fa-sm"></i></a></th>
						<th class="th-lg" style="font-weight: bold;">Result&nbsp;&nbsp;<a href="/resultsOrderResultsDesc"><i class="fas fa-sort-amount-down fa-sm"></i></a>&nbsp;&nbsp;&nbsp;<a href="/resultsOrderResults"><i class="fas fa-sort-amount-up fa-sm"></i></a></th>
						<th class="th-lg" style="font-weight: bold;">Score&nbsp;&nbsp;<a href="/resultsOrderScoreDesc"><i class="fas fa-sort-amount-down fa-sm"></i></a>&nbsp;&nbsp;&nbsp;<a href="/resultsOrderScore"><i class="fas fa-sort-amount-up fa-sm"></i></a></th>
						<th class="th-lg" style="font-weight: bold;">Duration&nbsp;&nbsp;<a href="/resultsOrderDurationDesc"><i class="fas fa-sort-amount-down fa-sm"></i></a>&nbsp;&nbsp;&nbsp;<a href="/resultsOrderDuration"><i class="fas fa-sort-amount-up fa-sm"></i></a></th>
						<th class="th-lg" style="font-weight: bold;">Date&nbsp;&nbsp;<a href="/resultsOrderDateDesc"><i class="fas fa-sort-amount-down fa-sm"></i></a>&nbsp;&nbsp;&nbsp;<a href="/resultsOrderDate"><i class="fas fa-sort-amount-up fa-sm"></i></a></th>
					</tr>
					</thead>
					<!--Table head-->

					<!--Table body-->
					<tbody>
					<tr>
                        <?php


                        foreach ($qrys AS $qry){
                            echo "
								<tr>
									<td>{$qry->CourseID}</td>
									<td>{$qry->CourseName}</td>
									<td>{$qry->Results}</td>
									<td>{$qry->Grade}</td>
									<td>{$qry->Duration}</td>
									<td>{$qry->Date}</td>
								</tr>
							";
                        };
                        ?>

					</tr>
					</tbody>
					<!--Table body-->
				</table>
				<!--Table-->
			</div>



		</div>
	</div>

			</div>
		</div>
	</div>
	</body>






@endsection
