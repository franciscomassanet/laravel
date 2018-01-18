@extends('layouts.login_menu')

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
                                            <hr>
                                            <div class="col-md-8 col-md-offset-2">
                                                <h3 class="display-3 mb-5 wow fadeInDown" data-wow-delay="0.3s">Blended Learning Consortium</h3>
                                            </div>
                                            <div class="col-md-4 col-md-offset-4">
                                                <a class="indigo-text font-bold" href="signin"><img src="../img/icon/google_sign.png"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!--Section: Products v.3-->


        </div>


    </main>
    <!--Main Layout-->
@endsection
