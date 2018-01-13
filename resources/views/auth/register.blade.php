<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="MoneyLandGH">
    <meta name="author" content="MoneyLandGH">
    <meta name="keyword" content="MoneyLandGH">
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mx-4">
                    <div class="card-body p-4">
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

                        <p class="text-muted">Register here</p>
                        <form class="login-form"  method="POST"  action="{{ url('/register') }}">
                            {!! csrf_field() !!}


                        <div class="input-group mb-3">
                            <span class="input-group-addon">@</span>
                            <input type="text" class="form-control" name="email" placeholder="Email" required="">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-addon"><i class="icon-lock"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>

                        <div class="input-group mb-4">
                            <span class="input-group-addon"><i class="icon-lock"></i></span>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Repeat password" required>
                        </div>
                            <div class="input-group mb-4">
                                <span class="input-group-addon"><i class="icon-phone"></i></span>
                                <input type="text"  name="phone" class="form-control" placeholder="Valid phone number" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-addon"><i class="icon-user"></i></span>
                                <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-addon"><i class="icon-user"></i></span>
                                <input type="text" class="form-control" name="lastname" placeholder="Surname" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-addon"><i class="icon-user"></i></span>
                                 <select required="" name="gender" >
                                     <option value="">Select gender</option>
                                     <option>Male</option>
                                     <option>Female</option>
                                 </select>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-addon"><i class="icon-user"></i></span>
                                <input type="text" class="form-control" name="address" placeholder="Address"  >
                            </div>
                        <div class="input-group mb-4">
                            <small><b>Agree to terms</b></small>

                            <input type="checkbox" required="" value="1" class="switch-input"  >
                            <span class="switch-label" data-on="On" data-off="Off"></span>
                            <span class="switch-handle"></span>
                        </div>



                        <button type="submit" class="btn btn-block btn-success">Create Account</button>

                </form>
                    </div>
                    <div class="card-footer p-4">
                        <div class="row">
                            <div class="col-6">
                                <button class="btn btn-block btn-primary" type="button">
                                    <span>Terms and condition</span>
                                </button>
                            </div>
                            <div class="col-6">
                                <a href="http://www.moneylandgh.com" class="btn btn-block btn-outline-warning"  >
                                    <span>Click to go to main website</span>
                                </a>
                            </div>

                        </div>
                    </div>

                </div>

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