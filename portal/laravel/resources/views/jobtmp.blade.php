<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('/bootstrap/css/modern-business.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('/bootstrap/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ asset('/job') }}"><img height="30" width="70" alt="Job-Portal" src="http://i1301.photobucket.com/albums/ag116/shubham121384/logo_zpsde78hip2.jpg?t=1429200872"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ asset('/job/openings') }}">Openings</a>
                </li>
                <li>
                    <a href="{{ asset('/job/walkins') }}">Walkins</a>
                </li>
                <li>
                    <a href="{{ asset('/job/training') }}">Training Institutes</a>
                </li>
                <li>
                    <a href="{{ asset('/job/consult') }}">Consultancies</a>
                </li>
                <li>
                    <a href="{{ asset('/job/preparation') }}">Preparation Material</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login/Register <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        @if (Auth::guest())
                            <li><a href="{{ url('/auth/login') }}">Login</a></li>
                            <li><a href="{{ url('/auth/register') }}">Register</a></li>
                        @elseif(Auth::user()->authority == 'employer')
                            <li><a href="#">Hi Employer : {{ Auth::user()->name }} </a></li><hr/>
                            <li><a href="{{ url('/auth/logout') }}">Employer {{ Auth::user()->name }} Logout</a></li>
                        @else
                            <li>Hi User : {{ Auth::user()->name }}</li><hr/>
                            <li><a href="{{ url('/auth/logout') }}">User {{ Auth::user()->name }} Logout</a></li>

                        @endif
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Your Services <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        @if (Auth::guest())
                            <li class="disabled">
                            <a href="#" >first login</a>
                            </li>
                        @elseif(Auth::user()->authority == 'employer')
                            <li>Hi Employer : {{ Auth::user()->name }} </li><hr/>
                            <li><a href="{{ asset('/job/create') }}"> Create jobs</a></li>
                            <li><a href="{{ asset('/job/cwalkins') }}"> Create walkins</a></li>
                            <li><a href="{{ asset('/job/ctraining') }}"> Create Trainings</a></li>
                            <li><a href="{{ asset('/job/ccons') }}">Create consultancies</a></li>
                            <li><a href="{{ asset('/job/cprepare') }}">Create preparation</a></li>
                            <li><a href="{{ asset('/job/Applye/'.Auth::id()) }}">Applications/Requests</a></li>
                        @else
                            <li>Hi User : {{ Auth::user()->name }}</li><hr/>
                            <li><a href="{{ asset('/job/Applyu/'.Auth::id()) }}">Your Applications</a></li>
                            <li><a href="{{ asset('job/user/'.Auth::id()) }}">Your Profile</a></li>
                            <li><a href="{{ asset('/job/openings') }}"> new jobs</a></li>
                            <li><a href="{{ asset('/job/walkins') }}"> walkins</a></li>
                            <li><a href="{{ asset('/job/training') }}"> training institutes</a></li>
                            <li><a href="{{ asset('/job/consultancies') }}"> consultancies</a></li>
                            <li><a href="{{ asset('/job/preparation') }}"> preparation material</a></li>

                        @endif

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Employer Zone <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        @if (Auth::guest())
                            <li><a href="{{ url('/auth/login') }}">Login</a></li>
                            <li><a href="{{ url('/auth/register-employer') }}">Register</a></li>
                        @elseif(Auth::user()->authority == 'employer')
                            <li>Hi Employer : {{ Auth::user()->name }} </li><hr/>
                            <li><a href="{{ url('/auth/logout') }}">Employer {{ Auth::user()->name }} Logout</a></li>
                            @else
                            <li>Hi User : {{ Auth::user()->name }}</li><hr/>
                            <li><a href="{{ url('/auth/logout') }}">User {{ Auth::user()->name }} Logout</a></li>

                        @endif
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

        @yield('slider')
<!-- end of slider -->

<!-- Page Content -->
<div class="container">
    @if(Session::has('msg'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('msg') }}
        </div>
    @endif

        @yield('search_panel')
            <!-- **************************** Search Panel Ends here ************************************* -->



            <!-- opening starts here -->
        @yield('opening_panel')
            <!-- /. openin row close -->


        <!-- walkims institutes -->
        @yield('walkins_panel')
        <!-- /. training panel row close -->


        <!-- walkims institutes -->
        @yield('general')
        <!-- /. training panel row close -->



        <!-- training institutes -->
        @yield('training_panel')
        <!-- /. training panel row close -->



        <!-- walkims Section -->
        @yield('consultancies_panel')
        <!-- /. walkins panel row close -->


        <!-- walkims Section -->
        @yield('preparation_panel')
        <!-- /. walkins panel row close -->




</div>
<!-- /.container -->

<!-- Footer -->
<footer>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3" style=" border-style: solid; border-width:1;">
                    <ul>
                        <li>
                            <a href="#"><h3>Information</h3></a>
                        </li>
                        <br/>
                        <li>
                            <a href="#">About Us</a>
                        </li>
                        <li>
                            <a href="#">Contact Us</a>
                        </li>
                        <li>
                            <a href="#">Terms & Condition</a>
                        </li>
                        <li>
                            <a href="#">Privacy Policy</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3" style=" border-style: solid; border-width: 2px;">
                    <ul>
                        <li>
                            <a href="#"><h3>Job Seekar</h3></a>
                        </li>
                        <br/>
                        <li>
                            <a href="#">Login / Sign Up</a>
                        </li>
                        <li>
                            <a href="#">Search Job</a>
                        </li>
                        <li>
                            <a href="#">Report a Problem</a>
                        </li>
                        <li>
                            <a href="#">Blogs</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3" style=" border-style: solid; border-width: 2px;">
                    <ul>
                        <li>
                            <a href="#"><h3>Brows Jobs</h3></a>
                        </li>
                        <br/>
                        <li>
                            <a href="#">All Jobs</a>
                        </li>
                        <li>
                            <a href="#">IT Jobs</a>
                        </li>
                        <li>
                            <a href="#">Govt. Jobs</a>
                        </li>
                        <li>
                            <a href="#">International Jobs</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3" style=" border-style: solid; border-width: 2px;">
                    <ul>
                        <li>
                            <a href="#"><h3>Employer</h3></a>
                        </li>
                        <br/>
                        <li>
                            <a href="#">Post a Job</a>
                        </li>
                        <li>
                            <a href="#">Access Database</a>
                        </li>
                        <li>
                            <a href="#">Report a problem</a>
                        </li>
                        <li>
                            <a href="#">Login / Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</footer>


<!-- jQuery -->
<script src="{{ asset('/bootstrap/js/jquery.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>
<script>
    $('div.alert').not('.alert-important').delay(5000).slideUp(500);
</script>

</body>

</html>
