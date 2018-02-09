<html lang="{{ app()->getLocale() }}">


<head>
    <!-- Required meta tags always come first -->
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
        
		
		
    </style>

</head>

<!--Main Navigation-->
    <header>

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark scrolling-navbar" >
            <div class="container" style="background-color:black;">
                <a class="navbar-brand" href="/home"><strong>Blended Learning Consortium</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
					<!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/home">Home <span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/subjects">Subjects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/help">Help</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Reports
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/blc_class_page.html">Teacher Report</a>
                                <a class="dropdown-item" href="/blc_dashboard.html">College Report</a>
                            </div>
                        </li>
                    </ul>
					
					<!-- Right Side Of Navbar -->
                    <ul class="navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}" class="dropdown-item">Login</a></li>
                            <li><a href="{{ route('register') }}" class="dropdown-item">Register</a></li>
                        @else
                            <li class="navi-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a href="/myResults" class="dropdown-item">My Results</a></li>
                                    <li><a href="/myClassrooms" class="dropdown-item">My Classrooms</a></li>
                                    <li><a href="/teachers" class="dropdown-item">Manage Teachers</a></li>
                                    <li><a href="/insert_course" class="dropdown-item">Add New Course</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}" class="dropdown-item"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
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
		
		@yield('content')
		
		
		</div>
    </main>
<!--Main Layout-->	

<!--Footer-->
    <footer class="page-footer center-on-small-only mdb-color lighten-2">

        <!--Footer Links-->
        <div class="container">
            <div class="row">

                <!--First column-->
                <div class="col-md-6 mr-auto">
                    <h5 class="title mb-3">BLC G-Suite Edition</h5>
                    <p>In partnership with:</p>
					<ul>
						<li>Square Cloud Learning</li>
						<li>Blended Learning Consortium ( BLC )</li>
						<li>C-Learning</li>
					</ul>
                </div>
                <!--/.First column-->

                <hr class="w-100 clearfix d-md-none">

                <!--Second column-->
                <div class="col-md-6 ml-auto" align="right">
                    <h5 class="title mb-3">Links</h5>
                    <ul>
                        <li><a href="http://square-cloud.co.uk" target="_blank">Square Cloud Learning</a></li>
						<li><a href="http://blc-fe.org/" target="_blank">BLC</a></li>
                        <li><a href="http://clearning.net" target="_blank">C-Learning</a></li>
                        <li><a href="https://edu.google.com/products/productivity-tools/" target="_blank">Google G-Suite</a></li>
                    </ul>
                </div>
                <!--/.Second column-->

                <hr class="w-100 clearfix d-md-none">


            </div>
        </div>
        <!--/.Footer Links-->

        <hr>

        <!--Social buttons-->
        <div class="social-section text-center">
            <ul>

                <li><a class="btn-floating btn-fb"><i class="fa fa-facebook"> </i></a></li>
                <li><a class="btn-floating btn-tw"><i class="fa fa-twitter"> </i></a></li>
                <li><a class="btn-floating btn-gplus"><i class="fa fa-google-plus"> </i></a></li>
                <li><a class="btn-floating btn-li"><i class="fa fa-linkedin"> </i></a></li>
                <li><a class="btn-floating btn-dribbble"><i class="fa fa-dribbble"> </i></a></li>

            </ul>
        </div>
        <!--/.Social buttons-->

        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
                © 2017 Copyright: Square Cloud Learning LTD </a>

            </div>
        </div>
        <!--/.Copyright-->

    </footer>
<!--/.Footer-->
		

	<!-- SCRIPTS -->
    <!-- jQuery -->
    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <!-- Popper -->
    <script type="text/javascript" src="/js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="/js/mdb.min.js"></script>
	<!-- App -->
    <script src="{{ asset('js/app.js') }}"></script>
