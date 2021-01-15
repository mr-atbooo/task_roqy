@extends('cpanel.index')

@section('all')

@section('title')
    {{__('home.add')}} {{__('home.roles')}}
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
                    <h1>{{__('home.add')}} {{__('home.roles')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"> {{__('home.dashboard')}} </a></li>
                        <li class="breadcrumb-item"><a href="{{route('roles')}}"> {{__('home.roles')}} </a></li>
                        <li class="breadcrumb-item active">{{__('home.add')}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            {!! Form::open(['route'=>'roles-store' ,'enctype'=>'multipart/form-data','role'=>'form'])!!}

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">

                            <div class="card-body">

                                <div class="form-group col-md-6" style="float: left;">
                                    <label for="title">Title</label>
                                    <input type="text" name="title"  value="{{old('title')}}" required class="form-control  {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" placeholder="Enter title">
                                    @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4" style="float: left;">
                                    <label for="order">Order</label>
                                    <input type="number" name="order" value="{{old('order')}}" class="form-control" id="order" placeholder="Order">
                                    @error('order')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2" style="float: left;">

                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger btn-round form-control"
                                       style="margin-top: 30px;border: none;background: #343a40;" id="all">
                                        Get All Permission
                                    </a>
                                </div>

                            </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!---- st permission ---->
                @foreach($permissions as $permission)
                    <div class="col-md-3">
                        <div class="card card-success">
                            <div class="card-header" style="background: #343a40;">
                                <h3 class="card-title">{{$permission->name}}</h3>

                                <div class="card-tools">
                                    <a href="javascript:void(0);">
                                        <input type="checkbox" class="checkbox{{$permission->id}}" value="{{$permission->id}}" name="permission[]" onclick="myFunction">
                                    </a>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                @foreach(\Spatie\Permission\Models\Permission::where('parent_id',$permission->id)->get() as $perm)
                                <div>
                                    <span>{{$perm->name}}</span>
                                    <input type="checkbox" name="permission[]" value="{{$perm->id}}" class="checkbox{{$permission->id}}" style="float: right;margin-top: 3px;">
                                </div>
                                @endforeach

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
            @endforeach
            <!---- nd permission ---->

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">


                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                </div>
            </div>
        {!! Form::close()!!}

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




        $( "a input:checkbox" ).click(function() {
            var className = $(this).attr('class');
            if (this.checked) {
                $('.'+className).prop('checked', true);
            } else {
                $('.'+className).prop('checked', false);
            }
        });
        var c = 0;
        $( "#all" ).click(function() {
            if(c==0){
                $('input:checkbox').prop('checked', true);
                c = 1;
            }else{
                $('input:checkbox').prop('checked', false);
                c=0;
            }


        });

    </script>
    </script>
@stop
@stop
