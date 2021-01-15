@extends('cpanel.index')

@section('all')

@section('title')
    {{__('home.edit')}} {{__('home.users')}}
@stop
@section('style')
    <!-- ckeditor -->
    {!! Html::script('resources/assets/cpanel/plugins/ckeditor/ckeditor.js') !!}
@stop

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('home.edit')}} {{__('home.users')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"> {{__('home.dashboard')}} </a></li>
                        <li class="breadcrumb-item"><a href="{{route('users')}}"> {{__('home.users')}} </a></li>
                        <li class="breadcrumb-item active">{{__('home.edit')}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                    {{--                        <div class="card-header">--}}
                    {{--                            <h3 class="card-title">Quick Example</h3>--}}
                    {{--                        </div>--}}
                    <!-- /.card-header -->
                        <!-- form start -->
                        {!! Form::open(['route'=>'users-update' ,'enctype'=>'multipart/form-data','role'=>'form'])!!}
                        <input type="hidden" name="id" value="{{$item->id}}">

                        <div class="card-body">
                            <div class="form-group col-6" style="float: left;">
                                <label for="name">Name</label>
                                <input type="text" name="name"  value="{{$item->name}}" required class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" placeholder="Enter name">
                                @error('title')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-6" style="float: left;">
                                <label for="email">Email</label>
                                <input type="email" name="email"  value="{{ $item->email }}" required class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" placeholder="Enter email">
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group col-6" style="float: left;">
                                <label for="roles">{{__('home.roles')}}</label>
                                <select class="custom-select" required name="role">
                                    <option value="" hidden selected>Choose</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}"
                                        @if($myrole) @if($myrole->id == $role->id) selected @endif  @endif
                                        >
                                            {{$role->name}}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group col-6" style="float: left;">
                                <label for="password">Password</label>
                                <input type="text" name="password"  value="{{old('password')}}" required class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" placeholder="Enter Password">
                                @error('password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-12" style="float: left;">
                                <label for="img">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="img"  accept="image/*" class="custom-file-input" id="img">
                                        <label class="custom-file-label" for="img">Choose file</label>
                                    </div>

                                    @if($item->avatar)
                                        <a href="{{url('resources/assets/cpanel/images/users/'.$item->avatar)}}" target="_blank">
                                            <img class='img' id="blah" src='{{url('resources/assets/cpanel/images/users/'.$item->avatar)}}'  style=" width:92px;height:38px;">
                                        </a>
                                    @else
                                        <img class='img' id="blah" src=''  style="display: none; width:92px;height:38px;">
                                    @endif
                                    @error('img')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        {!! Form::close()!!}

                    </div>
                    <!-- /.card -->

                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@section('footer')
    <!-- bs-custom-file-input -->
    <script src="{{url('resources/assets/cpanel/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('resources/assets/cpanel/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('resources/assets/cpanel/dist/js/demo.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
        });

        /*************  start preview-an-image-before-it-is-uploaded ***/

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                    $('#blah').show();
                    // $('#blah').removeClass('hidden');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#img").change(function() {
            readURL(this);
        });
        /*************  end preview-an-image-before-it-is-uploaded ***/
    </script>
@stop
@stop
