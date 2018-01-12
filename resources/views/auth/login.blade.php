<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CoreUI Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="CoreUI Bootstrap 4 Admin Template">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>MoneyLandGh</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">

    <link rel="stylesheet" id="css-main" href="{!!url('public/css/fontawesome-all.min.css')!!}">

    <link rel="stylesheet" href="{{ url('public/logins/css/simple-line-icons.min.css') }}">

    <link rel="stylesheet" href="{{ url('public/logins/css/style.css') }}">
    <link rel="stylesheet" id="css-main" href="{!!url('public/css/fontawesome-all.min.css')!!}">


</head>

<body class="app flex-row align-items-center">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group mb-0">
                <div class="card p-4">
                    <div class="card-body">
                        @if (count($errors) > 0)

                            <div class="uk-form-row">
                                <div class="alert alert-danger" style="background-color: red;color: white">

                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li> {!!  $error  !!} </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <h3>MoneyLandGH</h3>
                        <p class="text-muted">Sign In to your account</p>
                        <form class="login-form"  method="POST"  action="{{ url('/login') }}">
                            {!! csrf_field() !!}
                        <div class="input-group mb-3">
                            <span class="input-group-addon"><i class="icon-user"></i></span>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-addon"><i class="icon-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary px-4">Login</button>
                            </div>
                            <div class="col-6 text-right">
                                <button type="button" class="btn btn-link px-0">Forgot password?</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        <div style="text-align: justify;">
                            <h2>About</h2>
                            <p> Login into the portal to view profile</p>
                            <p> Login into the portal to confirm payment</p>
                            <p> Login into the portal to view upcoming matches</p>
                            <button type="button" class="btn btn-primary active mt-3">Contact us!</button>
                        </div>
                    </div>
                </div>
            </div>
            <center> <footer><small>&copy {{date("Y")}}.All rights reserved - MoneyLandGH | designed by Gad +233243348522</small></footer></center>
        </div>
    </div>
</div>

<!-- Bootstrap and necessary plugins -->

<script src="{{ url('public/logins/js/jquery.min.js') }}"></script>
<script src="{{ url('public/logins/js/popper.min.js') }}"></script>
<script src="{{ url('public/logins/js/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>

</body>
</html>