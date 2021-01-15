@extends('cpanel.index')
@section('all')
@section('title') {{__('home.profile')}} @stop
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">


            <!--Start breadcrumb bottom area-->
<div class="row">
    <div class="col-sm-12">
        <h4 class="page-title">{{__('home.profile')}}</h4>
    </div>
</div>
            <!--End breadcrumb bottom area-->
            @if(session()->get('done'))
                <div class="alert alert-success">
                    <h3>{{session()->get('done')}}</h3>
                </div>
            @endif
            @if(session()->get('fail'))
                <div class="alert alert-danger">
                    <h3>{{session()->get('fail')}}</h3>
                </div>
            @endif
            <br>
<div class="row">
                <div class="col-lg-12">
                    <section class="panel">

                        <div class="panel-body">
                            {!! Form::open(['url'=>'dashboard/profile'])!!}


                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name">{{__('home.name')}}</label>
                                        <input type="text"name="name" class="form-control" value="{{$user->name}}"id="name">
                                        @error('name')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email"> Email</label><br>
                                        <input type="email"name="email"id="email"class="form-control" value="{{$user->email}}">
                                        @error('email')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} ">
                                       <label for="password"> {{__('home.password')}}</label><br>
                                       <input type="password"name="password"class="form-control" id="password">
                                        @error('password')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group {{ $errors->has('con_password') ? ' has-error' : '' }} ">
                                       <label for="con_password">{{__('home.con_password')}}</label><br>
                                       <input type="password"name="con_password"class="form-control" id="con_password">
                                        @error('con_password')
                                            <span class="help-block">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                              <!-- here was code for rol -->
                              <!-- /here was code for rol -->
                                <input type="submit" value="save" class="btn btn-send">
                            </form>

                        </div>
                    </section>
                </div>
@stop
