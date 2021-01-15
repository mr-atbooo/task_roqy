<!DOCTYPE html>
<html>

<head>
    <title> RoQaY Sign Up</title>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="author" content="RoQaY">
    <meta name="robots" content="index, follow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=" Smart Movies website">
    <meta name="keywords" content=" Smart Movies ">
    <meta name="csrf-token" content="V2G8zLS7dL5HzdfwxaBDewvJvAKCyeThQE4NBtJv">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    {!! Html::style('site/css/bootstrap.min.css') !!}
    {!! Html::style('site/css/fontawesome.min.css') !!}
    {!! Html::style('site/css/animate.css') !!}
    {!! Html::style('site/css/all.min.css') !!}
    {!! Html::style('site/css/style.css') !!}
    {!! Html::style('site/css/responsive.css') !!}
</head>

<body>

<div class="body_wrapper">
    <div class="preloader">
        <div class="preloader-loading">
            <img src="{{url('site/images/logo-m.png')}}" data-src="{{url('site/images/logo-m.png')}}" class="lazyload">
        </div>
    </div>

    <div class="top_nav">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <ul class="d-flex about-site">
                        <li><a href="#">Questions</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Terms Of Privacy</a></li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <ul class="d-flex social ">
                        <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a></li>
                        <li> <a href="#"> <i class="fab fa-twitter"></i> </a></li>
                        <li> <a href="#"> <i class="fab fa-instagram"></i> </a></li>
                        <li> <a href="#"> <i class="fab fa-snapchat-ghost"></i> </a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="logo text-center">
        <a class="navbar-brand" href="{{url('/')}}">
            <img src="{{url('site/images/logo-m.png')}}" data-src="{{url('site/images/logo-m.png')}}"
                 class="lazyload"></a>
    </div>
    <section class="contact-us bg-light">
        <div class="container">
            <h3 class="text-center">Sign Up To Join Us</h3>

            <div class="row justify-content-center">
                <div class="col-md-7 col-sm-10">
                    <div class="contact-form">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                                <div class="form-group ">
                                    <label for="inputName">{{ __('Name') }}</label>
                                    <input type="text" id="inputName" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                           placeholder="Write Your Name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">{{ __('E-Mail Address') }}</label>
                                    <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"
                                           placeholder="Write Your Email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword">Enter Password </label>
                                    <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"
                                           placeholder=" Write Your password">
                                </div>

                                <div class="form-group">
                                    <label for="inputConfirmPassword">{{ __('Confirm Password') }} </label>
                                    <input type="password" id="inputConfirmPassword" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="  Confirm Your password">
                                </div>

                                <div class="text-center p-2">
                                    <button type="submit" class="btn btn-gradiant">Sign Up</button>
                                </div>

                                <div >
                                    <b> <span>Have An Account ?</span> <a href="{{ route('login') }}" class="main-color ">Login</a></b>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="pt-0">
        <div class="copyrights">
            <p>© All Rights reserved to Smart Movies website 2017</p>
        </div>
    </footer>
    <span class="scroll-top"> <a href="#"><i class="fas fa-chevron-up"></i></a> </span>


</div>

<script src="{{url('site/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{url('site/js/bootstrap.min.js')}}"></script>
<script src="{{url('site/js/popper.min.js')}}"></script>
<script src="{{url('site/js/lazysizes.min.js')}}"></script>
<script src="{{url('site/js/fontawesome.min.js')}}"></script>
<script src="{{url('site/js/all.min.js')}}"></script>
<script src="{{url('site/js/wow.min.js')}}"></script>
<script src="{{url('site/js/main.js')}}"></script>
</body>

</html>
