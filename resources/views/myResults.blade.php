@extends('layouts.student_menu')

@section('content')


	<style>
		.table-wrapper {
			display: block;
			overflow-y: auto;
			-ms-overflow-style: -ms-autohiding-scrollbar;
		}

	</style>

	<!--Top Table UI-->
	<div class="card p-2 mb-5">

		<!--Grid row-->
		<div class="row">

			<!--Grid column-->
			<div class="col-lg-3 col-md-12">

				<!--Name-->
				<select class="mdb-select colorful-select dropdown-primary mx-2">
					<option value="" disabled selected>Bulk actions</option>
					<option value="1">Delate</option>
					<option value="2">Export</option>
					<option value="3">Change segment</option>
				</select>

			</div>
			<!--Grid column-->

			<!--Grid column-->
			<div class="col-lg-3 col-md-6">

				<!--Blue select-->
				<select class="mdb-select colorful-select dropdown-primary mx-2">
					<option value="" disabled selected>Show only</option>
					<option value="1">All <span> (2000)</span></option>
					<option value="2">Never opened <span> (200)</span></option>
					<option value="3">Opened but unanswered <span> (1800)</span></option>
					<option value="4">Answered <span> (200)</span></option>
					<option value="5">Unsunscribed <span> (50)</span></option>
				</select>
				<!--/Blue select-->

			</div>
			<!--Grid column-->

			<!--Grid column-->
			<div class="col-lg-3 col-md-6">

				<!--Blue select-->
				<select class="mdb-select colorful-select dropdown-primary mx-2">
					<option value="" disabled selected>Filter segments</option>
					<option value="1">Contacts in no segments <span> (100)</span></option>
					<option value="1">Segment 1 <span> (2000)</span></option>
					<option value="2">Segment 2 <span> (1000)</span></option>
					<option value="3">Segment 3 <span> (4000)</span></option>
				</select>
				<!--/Blue select-->

			</div>
			<!--Grid column-->

			<!--Grid column-->
			<div class="col-lg-3 col-md-6">

				<form class="form-inline mt-2 ml-2">
					<input class="form-control my-0 py-0" type="text" placeholder="Search" style="max-width: 150px;">
					<button class="btn btn-sm btn-primary ml-2 px-1"><i class="fa fa-search"></i>  </button>
				</form>

			</div>
			<!--Grid column-->

		</div>
		<!--Grid row-->

	</div>
	<!--Top Table UI-->

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
						<th class="th-lg" style="font-weight: bold;">Course ID</th>
						<th class="th-lg" style="font-weight: bold;">Course Name</th>
						<th class="th-lg" style="font-weight: bold;">Result</a></th>
						<th class="th-lg" style="font-weight: bold;">Score</th>
						<th class="th-lg" style="font-weight: bold;">Duration</a></th>
						<th class="th-lg" style="font-weight: bold;">Date</th>
					</tr>
					</thead>
					<!--Table head-->

					<!--Table body-->
					<tbody>
					<tr>
                        <?php
                        $qrys = DB::table('results')
                            ->join('users_results', 'users_results.results_id', '=', 'results.id')
                            ->join('users', 'users_results.user_id', '=', 'users.id')
                            ->get();

                        foreach ($qrys AS $qry){

                            $user = app('Illuminate\Contracts\Auth\Guard')->user()->id;
                            if ($qry->id === $user){

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
                        };
                        ?>

					</tr>
					</tbody>
					<!--Table body-->
				</table>
				<!--Table-->
			</div>

			<hr class="my-0">



		</div>
	</div>








@endsection
