@extends('cpanel.index')

@section('all')

@section('title')
    {{__('home.edit')}} {{__('home.magazines')}}
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
                    <h1>{{__('home.edit')}} {{__('home.magazines')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"> {{__('home.dashboard')}} </a></li>
                        <li class="breadcrumb-item"><a href="{{route('magazines')}}"> {{__('home.magazines')}} </a></li>
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
                        {!! Form::open(['route'=>'magazines-update' ,'enctype'=>'multipart/form-data','role'=>'form'])!!}
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title"  value="{{$item->title}}" required class="form-control  {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" placeholder="Enter title">
                                @error('title')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="img">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="img"  accept="image/*" class="custom-file-input" id="img">
                                        <label class="custom-file-label" for="img">Choose file</label>
                                    </div>

                                    @if($item->img)
                                        <a href="{{url('resources/assets/cpanel/images/magazines/'.$item->img)}}" target="_blank">
                                        <img class='img' id="blah" src='{{url('resources/assets/cpanel/images/magazines/'.$item->img)}}'  style=" width:92px;height:38px;">
                                        </a>
                                    @else
                                        <img class='img' id="blah" src=''  style="display: none; width:92px;height:38px;">
                                    @endif
                                    @error('img')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea class="ckeditor form-control"   required="required"  name="desc" placeholder="Description">{!! $item->des !!}</textarea>
                                @error('desc')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="file">File</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input" id="file">
                                        <label class="custom-file-label" for="file">Choose file</label>
                                    </div>
                                    <a class="btn btn-success" href="{{route('magazines-show',$item->id)}}">
                                        <i class="fas fa-cloud-download-alt"></i> Download
                                    </a>
                                </div>
                                @error('file')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>


                            <div class="form-group">
                                <label for="views">Views</label>
                                <input type="number" name="views"  class="form-control {{ $errors->has('views') ? 'is-invalid' : '' }}" value="{{$item->link}}" id="views" placeholder="views">
                                @error('views')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="order">Order</label>
                                <input type="number" name="order" value="{{$item->order_by}}" class="form-control" id="order" placeholder="Order">
                                @error('order')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" {{$item->publish ? 'checked':''}} name="Publish" id="Publish">
                                    <label class="custom-control-label" for="Publish">Publish</label>
                                    @error('Publish')
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
