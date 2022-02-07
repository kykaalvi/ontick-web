<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Kyka Alvi">

    <!--favicon icon-->
    <title>KALVI Ticketing System</title>

    <!--web fonts-->
    <link href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!--bootstrap styles-->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--icon font-->
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/vendor/dashlab-icon/dashlab-icon.css" rel="stylesheet">
    <link href="assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="assets/vendor/themify-icons/css/themify-icons.css" rel="stylesheet">
    <link href="assets/vendor/weather-icons/css/weather-icons.min.css" rel="stylesheet">
    <!--jquery ui-->
    <link href="assets/vendor/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <!--custom styles-->
    <link href="assets/css/main.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/vendor/html5shiv.js"></script>
    <script src="assets/vendor/respond.min.js"></script>
    <![endif]-->

    <!--[if (gt IE 9) |!(IE)]><!-->
    <!--<link rel="stylesheet" href="assets/vendor/custom-nav/css/effects/fade-menu.css"/>-->
    <link rel="stylesheet" href="assets/vendor/custom-nav/css/effects/slide-menu.css"/>
    <!--<![endif]-->
</head>
<body>
<div class="app-body">
    <!--main content wrapper-->
        <div class="content-wrapper pt-0">
            <div class="container">
                <div class="row mb-0">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card mb-1 border-0" style="background-color: transparent;">
                            <div class="card-body mb-0">
                                <div class="text-center">
                                    <div class="mt-1 mb-2">
                                    </div>
                                    <h5 class="text-uppercase mb-0">Kalvi</h5>
                                    <h6 class="text-uppercase mb-0">Ticketing System</h6>
                                </div>
                            </div>
                    </div>
                </div class="col-md-3"></div>
                <div class="row">
                        <div class="col-md-3">
                        </div>
                    <div class="col-md-6">
                        <div class="card card-shadow mb-4">
                                <div class="card-header border-0">
                                        <div class="custom-title-wrap pb-1 mt-0">
                                            <div class="custom-title text-center pb-0">Register Admin </div>
                                        </div>
                                    </div>
                            <div class="card-body">
                                <form method="post" class=" right-text-label-form" action="{{ url('/register') }}">
                                    {!! csrf_field() !!}

                                    <div class="form-group">
                                        <label for="Input">{{ __('Name') }}</label>
                                        <input type="text" class="form-control{{$errors->has('name') ? ' is-invalid' : '' }}"
                                         name="name" id="name" value="{{ old('name') }}" placeholder="Full Name" required autofocus>
                                         @if ($errors->has('name'))
                                         <span class="invalid-feedback">
                                             <strong>{{ $errors->first('name') }}</strong>
                                         </span>
                                     @endif
                                    </div>

                                    <div class="form-group">
                                            <label for="Input">{{ __('Username') }}</label>
                                            <input type="text" class="form-control{{$errors->has('username') ? ' is-invalid' : '' }}"
                                             name="username" id="username" value="{{ old('username') }}" placeholder="Username" required>
                                             @if ($errors->has('username'))
                                             <span class="invalid-feedback">
                                                 <strong>{{ $errors->first('username') }}</strong>
                                             </span>
                                         @endif
                                        </div>

                                        <div class="form-group">
                                                <label for="Input">{{ __('Email') }}</label>
                                                <input type="text" class="form-control{{$errors->has('email') ? ' is-invalid' : '' }}"
                                                 name="email" id="email" value="{{ old('email') }}" placeholder="Email" required>
                                                 @if ($errors->has('email'))
                                                 <span class="invalid-feedback">
                                                     <strong>{{ $errors->first('email') }}</strong>
                                                 </span>
                                             @endif
                                            </div>

                                    <div class="form-group">
                                            <label for="InputPassword">Password</label>
                                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                            id="password" name="password" placeholder="Password" required>
                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                        </div>

                                        <div class="form-group">
                                                <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" 
                                                id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required>
                                                @if ($errors->has('password_confirmation'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                            @endif
                                            </div>

                                    <div class="form-group mb-0 float-center text-center">
                                        <div class="float-center text-center">
                                            <button type="submit" class="btn btn-danger" style="background:#6C3082!important;" name="login" value="login">Register</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-3">
                        </div>
                </div>
            </div>
        <!--/main content wrapper-->
        <!--footer-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>© 2020, made with <span style="color: #6C3082;" class="fa fa-heart"></span> by Kalvi.id</small>
                </div>
            </div>
        </footer>
        <!--/footer-->
    </div>
    </div>
    <!--basic scripts-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="assets/vendor/popper.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/jquery.nicescroll.min.js"></script>    
    <!--[if lt IE 9]>
    <script src="assets/vendor/modernizr.js"></script>
    <![endif]-->
    <!--basic scripts initialization-->
    <script src="assets/js/scripts.js"></script>
</body>
</html>

