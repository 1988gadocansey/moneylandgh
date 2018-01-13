
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>MoneyLandGH</title>

    <!-- Canonical SEO -->
    <link rel="canonical" href="http://www.creative-tim.com/product/paper-dashboard-pro"/>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />




    <link rel="stylesheet" href="{{ url('public/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('public/assets/css/paper-dashboard.css?v=1.2.1') }}">



    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ url('public/assets/css/themify-icons.css') }}">
</head>

<body>
<div class="wrapper">
    <div class="sidebar" data-background-color="brown" data-active-color="danger">
        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | brown"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-mini">
                MoneyLandGH
            </a>

            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
               MoneyLandGH
            </a>
        </div>
        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="//secure.gravatar.com/avatar/7c4ff521986b4ff8d29440beec01972d?size=100&d=mm&r=g" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
	                        <span>
								{{Auth::user()->name}}
		                        <b class="caret"></b>
							</span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse" id="collapseExample">
                        <ul class="nav">

                            <li>
                                <a href="#edit">

                                    <span class="{{url('/profile/form')}}">Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a class="item" href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li>
                    <a data-toggle="collapse" href="#dashboardOverview">
                        <i class="ti-panel"></i>
                        <p>Dashboard
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="dashboardOverview">
                        <ul class="nav">
                            <li>
                                <a href="dashboard/overview.html">
                                    <span class="sidebar-mini">O</span>
                                    <span class="sidebar-normal">Overview</span>
                                </a>
                            </li>
                            <li>
                                <a href="dashboard/stats.html">
                                    <span class="sidebar-mini">S</span>
                                    <span class="sidebar-normal">Stats</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#componentsExamples">
                        <i class="ti-package"></i>
                        <p>Components
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse " id="componentsExamples">
                        <ul class="nav">
                            <li>
                                <a href="components/buttons.html">
                                    <span class="sidebar-mini">B</span>
                                    <span class="sidebar-normal">Buttons</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/grid.html">
                                    <span class="sidebar-mini">GS</span>
                                    <span class="sidebar-normal">Grid System</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/panels.html">
                                    <span class="sidebar-mini">P</span>
                                    <span class="sidebar-normal">Panels</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/sweet-alert.html">
                                    <span class="sidebar-mini">SA</span>
                                    <span class="sidebar-normal">Sweet Alert</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/notifications.html">
                                    <span class="sidebar-mini">N</span>
                                    <span class="sidebar-normal">Notifications</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/icons.html">
                                    <span class="sidebar-mini">I</span>
                                    <span class="sidebar-normal">Icons</span>
                                </a>
                            </li>
                            <li>
                                <a href="components/typography.html">
                                    <span class="sidebar-mini"><i class="ti-panel"></i></span>
                                    <span class="sidebar-normal">Typography</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#formsExamples">
                        <i class="ti-clipboard"></i>
                        <p>
                            Forms
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="formsExamples">
                        <ul class="nav">
                            <li>
                                <a href="forms/regular.html">
                                    <span class="sidebar-mini">Rf</span>
                                    <span class="sidebar-normal">Regular Forms</span>
                                </a>
                            </li>
                            <li>
                                <a href="forms/extended.html">
                                    <span class="sidebar-mini">Ef</span>
                                    <span class="sidebar-normal">Extended Forms</span>
                                </a>
                            </li>
                            <li>
                                <a href="forms/validation.html">
                                    <span class="sidebar-mini">Vf</span>
                                    <span class="sidebar-normal">Validation Forms</span>
                                </a>
                            </li>
                            <li>
                                <a href="forms/wizard.html">
                                    <span class="sidebar-mini">W</span>
                                    <span class="sidebar-normal">Wizard</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#tablesExamples">
                        <i class="ti-view-list-alt"></i>
                        <p>
                            Table list
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="tablesExamples">
                        <ul class="nav">
                            <li>
                                <a href="tables/regular.html">
                                    <span class="sidebar-mini">RT</span>
                                    <span class="sidebar-normal">Regular Tables</span>
                                </a>
                            </li>
                            <li>
                                <a href="tables/extended.html">
                                    <span class="sidebar-mini">ET</span>
                                    <span class="sidebar-normal">Extended Tables</span>
                                </a>
                            </li>
                            <li>
                                <a href="tables/bootstrap-table.html">
                                    <span class="sidebar-mini">BT</span>
                                    <span class="sidebar-normal">Bootstrap Table</span>
                                </a>
                            </li>
                            <li>
                                <a href="tables/datatables.net.html">
                                    <span class="sidebar-mini">DT</span>
                                    <span class="sidebar-normal">DataTables.net</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#mapsExamples">
                        <i class="ti-map"></i>
                        <p>
                            Maps
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="mapsExamples">
                        <ul class="nav">
                            <li>
                                <a href="maps/google.html">
                                    <span class="sidebar-mini">GM</span>
                                    <span class="sidebar-normal">Google Maps</span>
                                </a>
                            </li>
                            <li>
                                <a href="maps/vector.html">
                                    <span class="sidebar-mini">VM</span>
                                    <span class="sidebar-normal">Vector maps</span>
                                </a>
                            </li>
                            <li>
                                <a href="maps/fullscreen.html">
                                    <span class="sidebar-mini">FSM</span>
                                    <span class="sidebar-normal">Full Screen Map</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="active">
                    <a href="charts.html">
                        <i class="ti-bar-chart-alt"></i>
                        <p>Charts</p>
                    </a>
                </li>
                <li>
                    <a href="calendar.html">
                        <i class="ti-calendar"></i>
                        <p>Calendar</p>
                    </a>
                </li>
                <li>
                    <a data-toggle="collapse" href="#pagesExamples">
                        <i class="ti-gift"></i>
                        <p>
                            Pages
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="pagesExamples">
                        <ul class="nav">
                            <li>
                                <a href="pages/timeline.html">
                                    <span class="sidebar-mini">TP</span>
                                    <span class="sidebar-normal">Timeline Page</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages/user.html">
                                    <span class="sidebar-mini">UP</span>
                                    <span class="sidebar-normal">User Page</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages/login.html">
                                    <span class="sidebar-mini">LP</span>
                                    <span class="sidebar-normal">Login Page</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages/register.html">
                                    <span class="sidebar-mini">RP</span>
                                    <span class="sidebar-normal">Register Page</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages/lock.html">
                                    <span class="sidebar-mini">LSP</span>
                                    <span class="sidebar-normal">Lock Screen Page</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-fill btn-icon"><i class="ti-more-alt"></i></button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#charts">Charts</a>
                </div>
                <div class="collapse navbar-collapse">
                    <form class="navbar-form navbar-left navbar-search-form" role="search">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" value="" class="form-control" placeholder="Search...">
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#stats" class="dropdown-toggle btn-magnify" data-toggle="dropdown">
                                <i class="ti-panel"></i>
                                <p>Stats</p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#notifications" class="dropdown-toggle btn-rotate" data-toggle="dropdown">
                                <i class="ti-bell"></i>
                                <span class="notification">5</span>
                                <p class="hidden-md hidden-lg">
                                    Notifications
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#not1">Notification 1</a></li>
                                <li><a href="#not2">Notification 2</a></li>
                                <li><a href="#not3">Notification 3</a></li>
                                <li><a href="#not4">Notification 4</a></li>
                                <li><a href="#another">Another notification</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#settings" class="btn-rotate">
                                <i class="ti-settings"></i>
                                <p class="hidden-md hidden-lg">
                                    Settings
                                </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">

                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, Copyrighted to <i class="fa fa-heart heart"></i>MoneyLandGH</a>
                </div>
            </div>
        </footer>
    </div>
</div>



</body>

<!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->

<script src="{{   url('public/assets/js/jquery-3.1.1.min.js')}}"></script>

<script src="{{   url('public/assets/js/jquery-ui.min.js')}}"></script>

<script src="{{   url('public/assets/js/perfect-scrollbar.min.js')}}"></script>

<script src="{{   url('public/assets/js/bootstrap.min.js')}}"></script>


<script src="{{   url('public/assets/js/jquery.validate.min.js')}}"></script>

<script src="{{   url('public/assets/js/es6-promise-auto.min.js')}}"></script>
<script src="{{   url('public/assets/js/moment.min.js')}}"></script>

<script src="{{   url('public/assets/js/bootstrap-datetimepicker.js')}}"></script>

<script src="{{   url('public/assets/js/bootstrap-selectpicker.jss')}}"></script>

<script src="{{   url('public/assets/js/bootstrap-notify.js')}}"></script>

<script src="{{   url('public/assets/js/sweetalert2.js')}}"></script>


<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFPQibxeDaLIUHsC6_KqDdFaUdhrbhZ3M"></script>



<script src="{{   url('public/assets/js/jquery.bootstrap.wizard.min.js')}}"></script>
<script src="{{   url('public/assets/js/bootstrap-table.js')}}"></script>

<script src="{{   url('public/assets/js/jquery.datatables.js')}}"></script>

<script src="{{   url('public/assets/js/paper-dashboard.js?v=1.2.1')}}"></script>

<script src="{{   url('public/assets/js/jquery.datatables.js')}}"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });    </script>

@yield('js')
<script type="text/javascript">
    $(document).ready(function(){
        demo.initChartsPage();
    });
</script>

</html>
