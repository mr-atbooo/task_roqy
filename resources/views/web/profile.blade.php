@extends('web.layout')
@section('content')
<section class="contact-us bg-light">
    <div class="container">
        @if(Session('success'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>@lang('home.success')!</strong> {{session('success')}}.
            </div>
        @endif
        <h3 class="text-center">Update Your Profile Info </h3>

        <div class="row justify-content-center">
            <div class="col-md-7 col-sm-10">
                <div class="contact-form">
                <form method="POST" action="{{ url('profile') }}">
                @csrf


				<div class="form-group ">
                    <label for="inputName">Write Your Name</label>
                   <input id="name" type="text" class="form-control" name="name" value="{{ @$user->name }}" required autofocus>
                </div>
                <div class="form-group">
                    <label for="inputEmail">Your Email Addrss</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ @$user->email }}" required>
                </div>
                <div class="form-group">
                    <label for="inputPassword">Enter Password </label>
                     <input id="password" type="password" class="form-control" name="password" >

                </div>

                <div class="form-group">
                    <label for="inputConfirmPassword">Confirm Password </label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                </div>

                <div class="text-center p-2">
                    <button type="submit" class="btn btn-gradiant">
                       save
                    </button>
                </div>


                </form>
                </div>
            </div>
        </div>
    </div>
</section>

@stop
