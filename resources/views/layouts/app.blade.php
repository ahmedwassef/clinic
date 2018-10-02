<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">


    <!-- Title Page-->
    <title>Hospital system</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('/asset/')}}/css/font-face.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('/')}}vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('/')}}vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="{{asset('/')}}vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('/asset/')}}/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
<div class="page-wrapper">

    @auth
             <!-- HEADER MOBILE-->
            <header class="header-mobile d-block d-lg-none">
                <div class="header-mobile__bar">
                    <div class="container-fluid">
                        <div class="header-mobile-inner">
                            <a class="logo" href="index.html">
                                <img src="{{asset('/asset/')}}/images/icon/logo.png" alt="CoolAdmin" />
                            </a>
                            <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                            </button>
                        </div>
                    </div>
                </div>
                <nav class="navbar-mobile">
                    <div class="container-fluid">
                        <ul class="navbar-mobile__list list-unstyled">
                            <li>
                                <a  href="{{asset('/')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>

                            </li>

                            <li>
                                <a href="{{asset('/patient/add')}}"><i class="fas fa-chart-bar"></i> New Appointment</a>
                            </li>

                            <li>
                                <a href="{{asset('/patient')}}"><i class="fas fa-table"></i>All Appointments</a>
                            </li>


                            @if (!Auth::guest() && Auth::user()->type=='admin')

                                <li>
                                    <a href="{{asset('/clerk/add')}}"><i class="fas fa-chart-bar"></i>New clerk</a>
                                </li>

                                <li>
                                    <a href="{{asset('/clerk')}}"><i class="fas fa-table"></i>All clerks</a>
                                </li>

                                <li>
                                    <a href="{{asset('/doctor/add')}}"><i class="fas fa-chart-bar"></i>New doctor</a>
                                </li>

                                <li>
                                    <a href="{{asset('/doctor')}}"><i class="fas fa-table"></i>All doctors</a>
                                </li>

                                <li>
                                    <a href="{{asset('/clinic/add')}}"><i class="far fa-check-square"></i>New clinic</a>
                                </li>

                                <li>
                                    <a href="{{asset('/clinic')}}"><i class="fas fa-calendar-alt"></i>All clinic</a>
                                </li>
                                @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

       
       <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <form class="form-header" action="{{asset('/patient/Search')}}" method="get">
                            <input class="au-input au-input--xl" type="text" name="na_id" placeholder="Enter Patient national id..." />
                            <button class="au-btn--submit" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </header>
            <!-- END HEADER MOBILE-->

            <!-- MENU SIDEBAR-->
            <aside class="menu-sidebar d-none d-lg-block">
                <div class="logo">
                    <a href="#">
                        <img src="{{asset('/asset/')}}/images/icon/logo.png" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar__content js-scrollbar1">
                    <nav class="navbar-sidebar">
                        <ul class="list-unstyled navbar__list">

                            <li class="active">
                                <a  href="{{asset('/')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            </li>


                            <li>
                                <a href="{{asset('/patient/add')}}"><i class="fas fa-chart-bar"></i> New Appointment</a>
                            </li>

                            <li>
                                <a href="{{asset('/appointment')}}"><i class="fas fa-table"></i>All Appointments</a>
                            </li>


                            @if (!Auth::guest() && Auth::user()->type=='admin')

                            <li>
                                <a href="{{asset('/clerk/add')}}"><i class="fas fa-chart-bar"></i>New clerk</a>
                            </li>

    

                            <li>
                                <a href="{{asset('/doctor/add')}}"><i class="fas fa-chart-bar"></i>New doctor</a>
                            </li>

                           

                            <li>
                                <a href="{{asset('/clinic/add')}}"><i class="far fa-check-square"></i>New clinic</a>
                            </li>

                          
                           

                            @endif

                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END MENU SIDEBAR-->
    @else



    @endauth

    <main>
            @yield('content')
    </main>
</div>

<!-- Jquery JS-->
<script src="{{asset('/')}}vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="{{asset('/')}}vendor/bootstrap-4.1/popper.min.js"></script>
<script src="{{asset('/')}}vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="{{asset('/')}}vendor/slick/slick.min.js">
</script>
<script src="{{asset('/')}}vendor/wow/wow.min.js"></script>
<script src="{{asset('/')}}vendor/animsition/animsition.min.js"></script>
<script src="{{asset('/')}}vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="{{asset('/')}}vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="{{asset('/')}}vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="{{asset('/')}}vendor/circle-progress/circle-progress.min.js"></script>
<script src="{{asset('/')}}vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{asset('/')}}vendor/chartjs/Chart.bundle.min.js"></script>
<script src="{{asset('/')}}vendor/select2/select2.min.js">
</script>

<!-- Main JS-->
<script src="{{asset('/asset/')}}/js/main.js"></script>

</body>

</html>
<!-- end document-->
