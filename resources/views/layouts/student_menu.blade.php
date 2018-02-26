<html lang="{{ app()->getLocale() }}">


<head>
    <!-- Required meta tags always come first -->
    <meta property="og:image" content="https://i.ytimg.com/vi/SfLV8hD7zX4/maxresdefault.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
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
            background-image: url("/img/wallpapers/stage.jpg");
            background-attachment: fixed;
            background-repeat:no-repeat;
            background-size:cover;
        }


    </style>

</head>

<!--Main Navigation-->
<header>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark scrolling-navbar" >
        <div class="container" style="background-color:black;">

            <a type="" class="navbar-brand btn btn-default" href="http://classroom.google.com" type="button"><strong>Google Classroom <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></strong></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div  float="right">
                <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                </div>


                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('signin') }}" class="dropdown-item">Login</a></li>
                        <li><a href="{{ route('signin') }}" class="dropdown-item">Register</a></li>
                    @else
                        <li class="navi-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="/home" class="dropdown-item">Home</a></li>
                                <li><a href="/myResults" class="dropdown-item">My Results</a></li>

                            </ul>
                        </li>
                    @endguest
                </ul>

            </div>
        </div>
    </nav>



</header>
<!--Main Navigation-->


<!--Main Layout-->
<main>
    <div class="container">
        <body oncontextmenu="return false">
        @yield('content')

        </body>
    </div>
</main>
<!--Main Layout-->


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
