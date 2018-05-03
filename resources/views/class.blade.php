

@extends('layouts.admin_menu')



<style>
    body {
        background-image: url("/img/wallpapers/launch.png");
        background-attachment: fixed;
        background-repeat:no-repeat;
        background-size:cover;
    }

</style>

@section('content')
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

                <div class="card card-cascade narrower" style="margin-bottom: 20px;">

                    <!--Card image-->
                    <div class="view gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

                        <div>
                            <span class='white-text mx-3'><h1>{{$className}}</h1></span>
                        </div>

                    </div>
                    <!--/Card image-->

                    <div class="px-4" style="margin-bottom: 40px;">


                        <?php
                        echo "<div class='row d-flex'>";
                        foreach ($results AS $item){
                            echo "
											<div class='col-lg-3 col-md-6 mb-r'>
												<div class='card card-cascade narrower z-depth-3'>

													<div class='' style='margin-top: 10px;'>
														<img src='{$item->profile->photoUrl}' class='img-fluid rounded mx-auto d-block' style='max-height: 100px;'>
													</div>

													<div class='card-body text-center no-padding'>
														<h4 class='card-title'><strong>{$item->profile->name->fullName}</strong></h4>
														<div class='card-footer'>
															<a href='/studentResults/{$item->profile->emailAddress}' class='btn btn-primary'>View</a>
														</div>
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
    </body>
@endsection
