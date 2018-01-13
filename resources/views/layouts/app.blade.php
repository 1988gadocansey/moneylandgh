<!--
Designed by Gad Ocansey <gadocansey@gmail.com> +233243348522
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="_token" content="{!! csrf_token() !!}"/>
    <title>Client Portal | MoneylendGh </title>
    <link rel="stylesheet" href="{{ url('public/assets/css/style.css') }}">

    <link rel="stylesheet" href="{{ url('public/assets/css/semantic.min.css') }}">


    <link rel="icon" type="image/x-icon" href="{{ url('public/assets/img/logo.png') }}" />
    <style type="text/css">
        img{
            max-width:180px;
        }
        input[type=file]{
            padding:10px;
            background:#2d2d2d;}
        .error{
            color:red;
        }

    </style>
    @yield('style')
</head>

<body id=" " class="pushable">
<div class="pusher">
    <div id="menu" class="ui large sticky inverted stackable menu">







        <div class="ui right stackable inverted menu">

            <a class="item" href="{{ url('/logout') }}"
               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>


            <p style="" class="item">Welcome {{ @Auth::user()->name }}</p>

        </div>



    </div>
    <div class="ui container">
        <header>
            <div class="ui basic segment">
                <div class="ui three column stackable grid">
                    <div class="column">
                        <a href="#">
                            <img style="width: 111px;margin-left: -24px" src="{{ asset('public/assets/images/logo.png') }}" alt="TTU logo"
                                 class="ui small image"/>

                        </a>
                    </div>

                </div>
            </div>


            <div class="ui large stackable menu">

                <a href="{{ url('/home') }}" class="item">Home</a>

                @if(Auth::user()->confirmed==1)
                    {{--  <a href="#" class="item">Notifications</a>--}}
                     <a href="{{url('/client/matches')}}" class="item">Matches</a>

                    <a href="{{url('/client/pledge/new')}}" class="item">Provide Help</a>
                    <a href="{{url('/client/pledges')}}" class="item">Transactions</a>
                    {{--<a href="{{url('/profile/form')}}" class="item">Confirm Payments</a>--}}
                    <a href="{{url('/profile/form')}}" class="item">Profile Update</a>
                @endif

                <a href="#" class="item">Last access {{   Carbon\Carbon::parse(Auth::user()->last_sign_in)->diffForHumans() }}</a>



            </div>

        </header>

        @yield('head')

        <div class="ui hidden divider"></div>




        <div class="ui padded segment">
            @yield('content')
        </div>


    </div>





    <footer id="footer" class="ui inverted vertical footer segment">
        <div class="ui container">
            <div class="ui inverted divided equal height stackable grid">


                <div class="eight wide column">

                    <p>&copy; {{  date('Y') }} MoneyLendGh
                           </p>
                </div>


            </div>
        </div>
    </footer>


</div>

<script src="{{ asset('public/assets/js/app.js')}}"></script>



<script src="{{   url('public/assets/js/vue.min.js') }}"> </script>
<script src="{{   url('public/assets/js/semantic.min.js') }}"> </script>
<script src="{{   url('public/assets/js/vue-form.min.js')}}"> </script>
<script src="{{   url('public/assets/js/detect.min.js')}}"></script>

<script src="{{   url('public/assets/js/clipboard.min.js')}}"></script>
<script src="{{   url('public/assets/js/cookie.min.js')}}"></script>
<script src="{{   url('public/assets/js/easing.min.js')}}"></script>
<script src="{{   url('public/assets/js/highlight.min.js')}}"></script>
<script src="{{   url('public/assets/js/history.min.js')}}"></script>
<script src="{{   url('public/assets/js/tablesort.min.js')}}"></script>



<script>
    $('.ui.modal')
        .modal('show');
    $('.ui.dropdown').dropdown();
    $('#applicant_step_one_dob_year').dropdown();
    $('#applicant_step_one_dob_month').dropdown();
    $('#applicant_step_one_dob_day').dropdown();


    $('.save').on('click', function () {
        $('.ui.basic.modal').modal('show');
    })
    $('table').tablesort();


</script>


<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });    </script>

@yield('js')


</body>
</html>
