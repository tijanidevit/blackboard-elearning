<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Dreams LMS</title>

    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.svg">

    <script src="/assets/js/theme-script.js" type="c8b33ed5478c9d6d8fbfda55-text/javascript"></script>

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="/assets/plugins/feather/feather.css">

    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>

    <div class="main-wrapper log-wrap">
        <div class="row">

            <div class="col-md-6 login-bg">
                <div class="owl-carousel login-slide owl-theme">
                    <div class="welcome-login">
                        <div class="login-banner">
                            <img src="/assets/img/login-img.png" class="img-fluid" alt="Logo">
                        </div>
                        <div class="mentor-course text-center">
                            <h2>Welcome to <br>DreamsLMS.</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        </div>
                    </div>
                    <div class="welcome-login">
                        <div class="login-banner">
                            <img src="/assets/img/login-img.png" class="img-fluid" alt="Logo">
                        </div>
                        <div class="mentor-course text-center">
                            <h2>Welcome to <br>DreamsLMS.</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        </div>
                    </div>
                    <div class="welcome-login">
                        <div class="login-banner">
                            <img src="/assets/img/login-img.png" class="img-fluid" alt="Logo">
                        </div>
                        <div class="mentor-course text-center">
                            <h2>Welcome to <br>DreamsLMS.</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 login-wrap-bg">

                <div class="login-wrapper">
                    <div class="loginbox">
                        <div class="w-100">
                            <div class="img-logo">
                                <img src="/assets/img/logo.svg" class="img-fluid" alt="Logo">
                                <div class="back-home">
                                    <a href="{{ url('/') }}">Back to Home</a>
                                </div>
                            </div>
                            <h1>Sign into Your Account</h1>
                            <form method="POST" action="{{route('login.post')}}">
                                @csrf
                                <div class="input-block">
                                    <label class="form-control-label">Email</label>
                                    <input type="email" id="email" required value="{{old('email')}}" name="email" class="form-control" placeholder="Email Address*">
                                    <x-form.error-message record='email' />
                                </div>
                                <div class="input-block">
                                    <label class="form-control-label">Password</label>
                                    <div class="pass-group">


                                        <input type="password" id="password" required name="password" class="form-control pass-input" placeholder="Password*">
                                        <span class="feather-eye toggle-password"></span>
                                        <x-form.error-message record='password' />
                                    </div>
                                </div>
                                {{-- <div class="forgot">
                                    <span><a class="forgot-link" href="forgot-password.html">Forgot Password
                                            ?</a></span>
                                </div>
                                <div class="remember-me">
                                    <label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Remember me
                                        <input type="checkbox" name="radio">
                                        <span class="checkmark"></span>
                                    </label>
                                </div> --}}
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-start" type="submit">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="google-bg text-center">
                        <p class="mb-0">New User ? <a href="{{route('register')}}">Create an Account</a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <script src="/assets/js/jquery-3.7.1.min.js" type="c8b33ed5478c9d6d8fbfda55-text/javascript"></script>

    <script src="/assets/js/bootstrap.bundle.min.js" type="c8b33ed5478c9d6d8fbfda55-text/javascript"></script>

    <script src="/assets/js/owl.carousel.min.js" type="c8b33ed5478c9d6d8fbfda55-text/javascript"></script>

    <script src="/assets/js/script.js" type="c8b33ed5478c9d6d8fbfda55-text/javascript"></script>
    <script src="/assets/js/rocket-loader.min.js"
        data-cf-settings="c8b33ed5478c9d6d8fbfda55-|49" defer></script>
</body>

</html>
