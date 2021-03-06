<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kayu</title>

        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/fontawesome-all.css') }}" />


        {{-- <link rel="stylesheet" href="{{ URL::asset('css/daterangepicker.css') }}" /> --}}
        {{-- <link rel="stylesheet" href="{{ URL::asset('css/animate.min.css') }}" /> --}}
        {{-- <link rel="stylesheet" href="{{ URL::asset('css/shCoreDefault.css') }}" /> --}}

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
        <body class="nav-md">
            <div class="container body" style="width:100%;padding:0;min-height:100vh;">
                <div class="main_container">
                <div class="col-md-3 left_col" style="position:fixed;">
                    <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <span class="site_title">Kayu</span>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                        <img src="./images/yuka.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                        <span>Bienvenue,</span>
                        <h2>{{ Auth::user()->prenom }} {{ Auth::user()->name }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                        <ul class="nav side-menu">
                          <li class="dashboard-menu"><a href="{{ route('dashboard') }}"><i class="fa fa-tachometer-alt"></i>  Dashboard </a>
                          </li>
                          <li><a href="{{ url('formpref') }}"><i class="fa fa-sliders-h"></i>  Mes Préférences </a>
                          </li>
                          <li><a href="{{ url('history') }}"><i class="fa fa-shopping-basket"></i>  Derniers scans </a>
                          </li>
                        </ul>

                        <ul class="nav side-menu bottom" style="display: flex;flex-wrap: wrap;">
                          <li><a style="border-right: 2px solid #1ABB9C;" href="{{ url('legalmentions') }}">Mentions légales </a></li><hr>
                          <li><a href="{{ url('cgu') }}">CGU </a></li>
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
                            <img src="{{ URL::asset('images/yuka.jpg') }}" alt="">{{ Auth::user()->prenom }}
                            <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                            <li><a href="{{ url('formpref') }}"><i class="fa fa-sliders-h"></i>  Mes préférences</a></li>
                            <li><a href="{{ url('downloadJSONFile') }}"><i class="fa fa-download"></i>  RGPD</a></li>
                            <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out-alt"></i>  Se déconnecter</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            </ul>
                        </li>
                      </ul>
                    </nav>
                    </div>
                </div>
                <!-- /top navigation -->
                <div class="right_col">
                  @section('content')
                  @show
                </div>

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
