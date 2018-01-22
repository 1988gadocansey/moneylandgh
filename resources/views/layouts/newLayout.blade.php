
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <title>MoneyLandGH</title>


    <link rel="stylesheet" href="{{url('public/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{url('public/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{url('public/assets/css/datepicker3.css') }}">
    <link rel="stylesheet" href="{{url('public/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{!! url('public/assets/css/select2.min.css') !!}" media="all">

@yield('style')
    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>

    <link rel="stylesheet" href="{{ url('public/assets/js/html5shiv.js') }}">
    <link rel="stylesheet" href="{{ url('public/assets/js/respond.min.js') }}">

    <![endif]-->
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="#"><span>MoneyLand</span> Ghana</a>@inject('sys', 'App\Http\Controllers\SystemController')
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="{{url('/fund')}}">
                        <em class="fa fa-envelope"></em><span class="label label-danger">{{$sys->pledgerCounter()}}</span>
                    </a>

                </li>

            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="//secure.gravatar.com/avatar/7c4ff521986b4ff8d29440beec01972d?size=100&d=mm&r=g" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div style='font-size:14px'class="profile-usertitle-name">Welcome {{ @Auth::user()->name }} | {{ucwords(@Auth::user()->role) }} </div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <form role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </form>
    <ul class="nav menu">
        @if(Auth::user()->confirmed==1 && Auth::user()->role=='user' )
        <li><a href="{{ url('/home') }}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>

        <li class="active"><a href="{{url('/client/pledges')}}"><em class="fa fa-database">&nbsp;</em> All Transactions</a></li>

          @endif
        @if(Auth::user()->confirmed==1 && Auth::user()->role=='admin')
        <li><a href="{{ url('/home') }}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
                <li><a href="{{url('/client/pledge/new')}}"><em class="fa fa-gift">&nbsp;</em> Provide Help</a></li>

                <li><a href="{{url('/client/all')}}"><em class="fa fa-user">&nbsp;</em> View Clients</a></li>
         <li><a href="{{url('/client/pledges')}}"><em class="fa fa-database">&nbsp;</em> View Transactions</a></li>

        <li><a href="{{url('/client/matches')}}"><em class="fa fa-tasks">&nbsp;</em>My own Matches</a></li>
        <li><a href="{{url('/client/match')}}"><em class="fa fa-tasks">&nbsp;</em>View Matches</a></li>
           <li><a href="{{url('/client/match/new')}}"><em class="fa fa-tasks">&nbsp;</em>Match Clients</a></li>
            @endif
            <li><a href="{{url('/profile/form')}}"><em class="fa fa-user-circle">&nbsp;</em> My Profile</a></li>
       
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
</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    @yield('content')


</div><!-- /.row -->




<script   src="{{url('public/assets/js/jquery-1.11.1.min.js')}}"></script>


<script   src="{{url('public/assets/js/bootstrap.min.js')}}"></script>

<script   src="{{url('public/assets/js/bootstrap-datepicker.js')}}"></script>
    <script   src="{{url('public/assets/js/jchart-data.js')}}"></script>
    <script   src="{{url('public/assets/js/chart.min.js')}}"></script>
    <script   src="{{url('public/assets/js/custom.js')}}"></script>
<script src="{{url('public/assets/js/easypiechart.js')}}"></script>
<script src="{{url('public/assets/js/easypiechart-data.js')}}"></script>

<script src="{!! url('public/assets/js/select2.full.min.js') !!}"></script>
<script src="{{   url('public/assets/js/vue.min.js') }}"> </script>

<script src="{{   url('public/assets/js/vue-form.min.js')}}"> </script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });    </script>

@yield('js')
</body>
</html>
