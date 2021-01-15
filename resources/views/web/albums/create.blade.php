@extends('web.layout')
@section('content')
<section class="contact-us bg-light">
    <div class="container">
        <h3 class="text-center">create New Album </h3>

        <div class="row justify-content-center">
            <div class="col-md-7 col-sm-10">
                <div class="contact-form">
                <form method="POST" action="{{ url('albums') }}" enctype="multipart/form-data">
                @csrf

              @if(Session('success'))
               <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>@lang('home.success')!</strong> {{session('success')}}.
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
				<div class="form-group ">
                    <label for="inputName">Write Album Name</label>
                   <input id="name" type="text" class="form-control" name="name" value="{{ @old('name')}}" required autofocus>
                </div>
                <div class="form-group">
                    <label for="inputEmail">Write Album Content</label>
                    <textarea name="content" class="form-control">{{ old('content') }}</textarea>
                </div>


                <div class="form-group">
                    <label for="inputConfirmPassword">photos</label>
                    <input  type="file" class="form-control" name="images[]"  required multiple>
                </div>

                 <div class="form-group">
                    <h5>album status</h5>
                   <label>
                    public
                       <input type="radio" name="status" value="public">
                   </label>
                   <label>
                    private
                       <input type="radio" name="status" value="private">
                   </label>
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
