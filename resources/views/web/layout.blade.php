<!DOCTYPE html>
<html>

<head>
    <title> Smart Movies </title>
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

    <style>
        .del{
            width: 20px;
            position: absolute;
            top: -12px;
            left: -5px;
            cursor: pointer;
            border: 1px solid #fff;
            border-radius: 25px;
            padding: 2px 5px;
            background: #F38C14;
            color: #fff;
        }
    </style>
</head>

<body>
<div class="body_wrapper">
    <div class="preloader">
        <div class="preloader">
            <div class="preloader-loading">
                <img src="{{url('site/images/logo-m.png')}}" data-src="{{url('site/images/logo-m.png')}}" class="lazyload">
            </div>
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
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{url('site/images/logo-m.png')}}" data-src="{{url('site/images/logo-m.png')}}"
                     class="lazyload"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <ul class="menu-bars">
                            <li><span></span></li>
                            <li><span></span></li>
                            <li><span></span></li>
                        </ul>
                    </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>



                    @if(!Auth::check())
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="btn btn-gradiant" style="color: #ffffff">login</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ url('profile') }}" class="btn btn-gradiant" style="color: #ffffff">{{ Auth::user()->name }}</a>

                        </li>
                        <li class="nav-item">
                            <a href="{{ url('albums') }}" class="btn btn-gradiant" style="color: #ffffff">albums</a>
                        </li>


                        @if(Auth::user()->type_user == 'admin')
                            <li class="nav-item">
                                <a href="{{ url('home') }}" target="_blank" class="btn btn-gradiant">
                                    Dashboard
                                </a>
                            </li>
                        @endif


                        <li class="nav-item">

                            <a href="{{ route('logout') }}" class="btn btn-gradiant" style="color: #ffffff"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </li>
                    @endif



                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a class="navbar-brand" href="index.html"><img src="images/logo-m.png"
                                                                   data-src="images/logo-m.png" class="lazyload"></a>
                    <p> Interact With The Content In An Interesting Educational Experience, Using Studying Means
                        Anywhere & Anytime Directly From your Computer. </p>
                </div>
                <div class="col-md-4">
                    <h5>Links</h5>
                    <div class="links d-flex">
                        <ul>
                            <li> <a href="#"> > Create Account</a></li>
                            <li> <a href="#"> > movie</a></li>
                            <li> <a href="#"> > Team </a></li>
                            <li> <a href="#"> > Company </a></li>
                        </ul>
                        <ul>
                            <li> <a href="#"> > Questions</a></li>
                            <li> <a href="#"> > Blog</a></li>
                            <li> <a href="#"> > Terms of Privacy </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Contact Us</h5>
                    <div><a href="mailto:info@smartmovie.com"> <i class="fas fa-envelope"></i>
                            info@smartmovie.com</a></div>
                    <form action="">
                        <div class="input-group mb-2">
                            <input type="email" class="form-control" id="inlineFormInputGroup"
                                   placeholder=" Your Email ">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <button class="btn btn-gradiant m-0">
                                        <a href="#">Send</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <ul class="d-flex social ">
                        <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a></li>
                        <li> <a href="#"> <i class="fab fa-twitter"></i> </a></li>
                        <li> <a href="#"> <i class="fab fa-instagram"></i> </a></li>
                        <li> <a href="#"> <i class="fab fa-snapchat-ghost"></i> </a></li>
                    </ul>
                </div>
            </div>
        </div>
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

@yield('footer')



</body>

</html>
