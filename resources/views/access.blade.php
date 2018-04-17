

@extends ('layouts.access_menu')



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
                        <div class="container flex-center">
                            <div class="row pt-5 mt-3">
                                <div class="col-md-12 mb-3">
                                    <div class="intro-info-content text-center">
                                        <div align="center">
                                            <img src="/img/banners/admin-only.jpg" class="img-fluid" alt="" style="">
                                        </div>
                                        <hr>
                                        <div class="card">
                                            <div class="card-body">
                                            <h1 class="display-3 mb-5 wow fadeInDown" data-wow-delay="0.3s">You Are Not Authorized</h1>
                                            <a class="btn btn-primary  waves-effect" href="/home">HOME <i class="fas fa-home"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </section>


        </div>




        </div>

    </main>
    <!--Main Layout-->
@endsection

