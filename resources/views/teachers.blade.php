@extends('layouts.admin_menu')

<style>
	body {
		background-image: url("img/wallpapers/topBanner.jpg");
		background-attachment: fixed;
		background-repeat:no-repeat;
		background-size:cover;
	}

	.form-light .font-small {
		font-size: 0.8rem; }

	.form-light [type="radio"] + label,
	.form-light [type="checkbox"] + label {
		font-size: 0.8rem; }

	.form-light [type="checkbox"] + label:before {
		top: 2px;
		width: 15px;
		height: 15px; }

	.form-light input[type="checkbox"] + label:before {
		content: '';
		position: absolute;
		top: 0;
		left: 0;
		width: 17px;
		height: 17px;
		z-index: 0;
		border-radius: 1px;
		margin-top: 2px;
		-webkit-transition: 0.2s;
		transition: 0.2s; }

	.form-light input[type="checkbox"]:checked + label:before {
		top: -4px;
		left: -3px;
		width: 12px;
		height: 22px;
		border-style: solid;
		border-width: 2px;
		border-color: transparent #EB3573 #EB3573 transparent;
		-webkit-transform: rotate(40deg);
		-ms-transform: rotate(40deg);
		transform: rotate(40deg);
		-webkit-backface-visibility: hidden;
		-webkit-transform-origin: 100% 100%;
		-ms-transform-origin: 100% 100%;
		transform-origin: 100% 100%; }

	.form-light .footer {
		border-bottom-left-radius: .3rem;
		border-bottom-right-radius: .3rem; }
</style>

@section('content')

	<div class="container" style="background-color: rgba(255,255,255,0.5); padding-top: 40px; min-height: 80%; ">
		<!--Card image-->
		<div class="card card-cascade narrower">
		<div class="view gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

			<div align="center">
				<span class="white-text mx-3"><h1>Teacher Management</h1></span>
			</div>

		</div>
		</div>
		<br><br>
		<div class="row">

			<div class="col-md-12">
				<section class="form-light">

					<!--Form without header-->
					<div class="card" style="margin-bottom: 20px;">
						<div class="card-body mx-4">

							<!--Header-->
							<div class="text-center">
								<h3 class="pink-text mb-5"><strong>Edit Teachers</strong></h3>
							</div>

							<form method="post" action="add/teacher" enctype="multipart/form-data">
							{{ csrf_field() }}
							<!--Body-->
								<div class="md-form">
									<input name="email" type="email" id="email" class="form-control">
									<label for="email">Teacher email</label>
								</div>

								<div class="md-form pb-3">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group ">
												<input name="add" type="checkbox" id="checkbox">
												<label for="checkbox" class="grey-text">Add teacher</label>
											</div>
											<div class="form-group">
												<input name="delete" type="checkbox" id="checkbox2">
												<label for="checkbox2" class="grey-text">Delete teacher</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input name="admin" type="checkbox" id="checkbox3">
												<label for="checkbox3" class="grey-text">Add Admin User</label>
											</div>
											<div class="form-group">
												<input name="delete_admin" type="checkbox" id="checkbox4">
												<label for="checkbox4" class="grey-text">Delete Admin User</label>
											</div>
										</div>
									</div>
								</div>

								<!--Grid row-->
								<div class="row d-flex align-items-center mb-4">

									<!--Grid column-->
									<div class="col-md-4"></div>
									<div class="col-md-4 text-center">
										<input type="submit" value="Submit" class="btn btn-pink btn-block btn-rounded z-depth-1"/>
									</div>
									<!--Grid column-->

								</div>
								<!--Grid row-->
							</form>
						</div>


					</div>
					<!--/Form without header-->

				</section>
			</div>

			<div class="col-md-12" >

				<div class="card card-cascade narrower" style="margin-bottom: 20px;">

					<!--Card image-->
					<div class="view gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

						<div>
							<span class='white-text mx-3'><h1>Active Teachers</h1></span>
						</div>

					</div>
					<!--/Card image-->

					<div class="px-4" style="margin-bottom: 40px;">
						<div class="table-wrapper">
							<!--Table-->
							<table class="table table-hover mb-0" >

								<!--Table head-->
								<thead align="center">
								<tr>
									<th class="th-lg" style="font-weight: bold;">Name</th>
									<th class="th-lg" style="font-weight: bold;">Email</th>
								</tr>
								</thead>
								<!--Table head-->

								<!--Table body-->
								<tbody>
								<tr>
									<?php
										$qrys = DB::table('users')->WHERE('is_teacher', '>=', 1)->get();

										foreach ($qrys AS $qry){

												echo "
												<tr>
													<td>{$qry->name}</td>
													<td>{$qry->email}</td>
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

			<div class="col-md-12" >

				<div class="card card-cascade narrower" style="margin-bottom: 20px;">


					<!--Card image-->
					<div class="view gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

						<div>
							<span class='white-text mx-3'><h1>Admin Users</h1></span>
						</div>

					</div>
					<!--/Card image-->


					<div class="px-4" style="margin-bottom: 20px;">
						<div class="table-wrapper">
							<!--Table-->
							<table class="table table-hover mb-0" >

								<!--Table head-->
								<thead align="center">
								<tr>
									<th class="th-lg" style="font-weight: bold;">Name</th>
									<th class="th-lg" style="font-weight: bold;">Email</th>
								</tr>
								</thead>
								<!--Table head-->

								<!--Table body-->
								<tbody>
								<tr>
                                    <?php
                                    $qrys = DB::table('users')->WHERE('is_teacher', '>=', 2)->get();

                                    foreach ($qrys AS $qry){

                                        echo "
												<tr>
													<td>{$qry->name}</td>
													<td>{$qry->email}</td>
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

@endsection
