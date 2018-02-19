

@extends('layouts.admin_menu')



<style>
    body {
        background-image: url("/img/wallpapers/topBanner.jpg");
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
                        <div class="table-wrapper">
                            <!--Table-->
                            <table id="example" class="table table-hover mb-0 table-responsive" >

                                <!--Table head-->
                                <thead align="center">
                                <tr>
                                    <th class="th-lg" style="font-weight: bold;">Photo</th>
                                    <th class="th-lg" style="font-weight: bold;">Name</th>
                                    <th class="th-lg" style="font-weight: bold;">email</th>
                                    <th class="th-lg" style="font-weight: bold;">Grades</th>
                                </tr>
                                </thead>
                                <!--Table head-->

                                <!--Table body-->
                                <tbody>
                                <tr>
                                    <?php


                                    foreach ($results AS $item){

                                        echo "
												<tr>
													<td><img src='{$item->profile->photoUrl}' alt='' style='max-height: 50px;'></td>
													<td>{$item->profile->name->fullName}</td>
													<td>{$item->profile->emailAddress}</td>
													<td><a href='' target='_blank'><i class='fas fa-link'></i></a></td>
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
