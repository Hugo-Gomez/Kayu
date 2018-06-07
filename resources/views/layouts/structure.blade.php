<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kayu</title>

        <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/fontawesome-all.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />

        {{-- <link rel="stylesheet" href="{{ URL::asset('css/daterangepicker.css') }}" /> --}}
        {{-- <link rel="stylesheet" href="{{ URL::asset('css/animate.min.css') }}" /> --}}
        {{-- <link rel="stylesheet" href="{{ URL::asset('css/shCoreDefault.css') }}" /> --}}

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
        <body class="nav-md">
            <div class="container body" style="width:100%;padding:0;">
                <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <span class="site_title">Kayu</span>
                    </div>
        
                    <div class="clearfix"></div>
        
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                        <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>{{ Auth::user()->name }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->
        
                    <br />
        
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                        <ul class="nav side-menu">
                        <li class="dashboard-menu"><a href="{{ route('dashboard') }}"><i class="fa fa-tachometer-alt"></i> Dashboard </a>
                            </li>
                            <li><a><i class="fa fa-sliders-h"></i> Préférences <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a>Roles</a></li>
                                <li><a>Mes préférences</a></li>
                            </ul>
                            </li>
                            <li><a><i class="fa fa-shopping-basket"></i> Derniers scans </a>
                            </li>
                        </ul>
                        </div>
        
                    </div>
                    <!-- /sidebar menu -->
                    </div>
                </div>
        
                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
        
                        <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <img src="images/img.jpg" alt="">{{ Auth::user()->name }}
                            <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li><a href="javascript:;"> Profile</a></li>
                            <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt pull-right"></i> Log Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            </ul>
                        </li>
        
                        {{-- <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                            <li>
                                <a>
                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                                </a>
                            </li>
                            <li>
                                <a>
                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                                </a>
                            </li>
                            <li>
                                <a>
                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                                </a>
                            </li>
                            <li>
                                <a>
                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                <span>
                                    <span>John Smith</span>
                                    <span class="time">3 mins ago</span>
                                </span>
                                <span class="message">
                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                </span>
                                </a>
                            </li>
                            <li>
                                <div class="text-center">
                                <a>
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                                </div>
                            </li>
                            </ul>
                        </li> --}}
                        </ul>
                    </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                @section('content')
                @show

                </div>
            </div>
        </body>
        <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/custom.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/smartresize.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/shBrushXml.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/shCore.js') }}"></script>
</html>
