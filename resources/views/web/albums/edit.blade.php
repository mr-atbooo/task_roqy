@extends('web.layout')
@section('content')
<section class="contact-us bg-light">
    <div class="container">
        <h3 class="text-center">create New Album </h3>

        <div class="row justify-content-center">
            <div class="col-md-7 col-sm-10">
                <div class="contact-form">
                <form method="POST" action="{{ url('albums/'.$album->id) }}" enctype="multipart/form-data">
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
                   <input id="name" type="text" class="form-control" name="name" value="{{ @$album->name}}" required autofocus>
                </div>
                <div class="form-group">
                    <label for="inputEmail">Write Album Content</label>
                    <textarea name="content" class="form-control">{{ @$album->content }}</textarea>
                </div>


                <div class="form-group">
                    <label for="inputConfirmPassword">photos</label>
                    <input  type="file" class="form-control" name="images[]" multiple  >

                    <div style="margin-top: 10px;" >
                    @foreach($album->images as $img)
<div style="position: relative;float: right;width: 100px" id="img_{{$img->id}}">
                            <span onclick="if(confirm('Do you want to delete this item?'))
                    { delImag('{{$img->id}}');}" class="del">x</span>
                        <img src="{{url('uploads/albums/'.$img->img)}}"
                             data-src="{{url('uploads/albums/'.$img->img)}}"
                             class="lazyload"
                             style="width: 90px;height: 90px">
</div>
                    @endforeach
                    </div>
                </div>

                 <div class="form-group " style="clear: both">
                    <h5>album status</h5>
                   <label>
                    public
                       <input type="radio" name="status" value="public" @if($album->status == 'public') checked="" @endif>
                   </label>
                   <label>
                    private
                       <input type="radio" name="status" value="private" @if($album->status == 'private') checked="" @endif>
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

    @section('footer')
        <script>

            function delImag($id){

                // alert($(this));
                $.ajax({
                    type: 'POST',
                    url:  '{{url("img/del")}}',
                    data: { '_token': "{{csrf_token()}}",
                        'id':$id,

                    },
                    dataType:'json',
                    success: function (data) {
                        //$.alert(datakk['status']);
                        if(data['data'] == 'done')
                        {

                            $('#img_'+$id).remove();
                        }
                        else
                        {
                            alert('Something wrong happend !');
                        }

                    },
                    error:function (err) {
                        alert('Something wrong happend !');
                    }
                });
            }


            // $(document).ready(function()
            // {
            //     alert('11');
            //     $('.del').on('click',function(e)
            //     {
            //
            //         if(!confirm('Do you want to delete this item?'))
            //         { e.preventDefault();}
            //
            //     });
            // });
        </script>

@stop
@stop
