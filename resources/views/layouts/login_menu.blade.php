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
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
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
    <script type="text/javascript" src="/js/mdb.min.js"></script>
	<!-- App -->
    <script src="{{ asset('js/app.js') }}"></script>
