<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-44263436-17"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-44263436-17');
    </script>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <!-- Required meta tags always come first -->
    <meta property="og:image" content="https://i.ytimg.com/vi/SfLV8hD7zX4/maxresdefault.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-signin-client_id" content="18710928026-b53mf9bceakbnbpsurgllocfoprm878f.apps.googleusercontent.com">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BLC G-Suite edition</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design for Bootstrap -->
    <link href="/css/mdb.min.css" rel="stylesheet">
    <!--Google Classroom API -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="18710928026-b53mf9bceakbnbpsurgllocfoprm878f.apps.googleusercontent.com">



    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>

        .top-nav-collapse {
            background-color: #7283A7 !important;
        }
        .navbar:not(.top-nav-collapse) {
            background: transparent !important;
        }
        @media (max-width: 768px) {
            .navbar:not(.top-nav-collapse) {
                background: #7283A7 !important;
            }
        }

        /*
                h5 {
                    letter-spacing: 3px;
                }
        */
        @media (max-width: 740px) {
            .full-height,
            .full-height body,
            .full-height header,
            .full-height header .view {
                height: 800px;
            }
        }
        footer.page-footer {
            background-color: #383838;
        }
        @media (max-width: 450px) {
            .display-3 {
                font-size: 3rem;
            }
        }

        body {
            background-image: url("/img/banners/E-learning.jpg");
            background-attachment: fixed;
            background-repeat:no-repeat;
            background-size:cover;
        }



        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <nav class="navbar navbar-expand-lg navbar-dark scrolling-navbar" >
                    <a type="" class="navbar-brand btn btn-default" href="{{ url('subjects') }}" type="button"><strong>Login<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></strong></a>
                </nav>

            @endauth
        </div>
    @endif

    <div class="content">
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
            </section>
        </div>
    </div>
</div>

<!-- SCRIPTS -->
<!-- jQuery -->
<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
<!-- Popper -->
<script type="text/javascript" src="/js/popper.min.js"></script>
<!-- Bootstrap -->
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<!-- MDB -->
<script type="text/javascript" src="/js/mdb.js"></script>
<!-- App -->
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
