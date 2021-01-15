@extends('web.layout')
@section('content')
<section class="contact-us bg-light">
    <div class="container">
        <h3 class="text-center">Browse your albums and Create New  <a href="{{ url('albums/create') }}" class="btn btn-info">Album</a></h3>
        <div class="table-responsive">
        	<table class="table">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>album</th>
		        <th>status</th>
		        <th>edit</th>
		        <th>delete</th>
		      </tr>
		    </thead>
		    <tbody>
				@foreach($albums as $album)
		      <tr>
		        <td>{{$album->id }}</td>
		        <td>{{$album->name }}</td>
		        <td>{{$album->status }}</td>
		        <td><a href="{{ url('albums/'.$album->id.'/edit') }}" class="btn btn-warning">edit</a></td>
                  <td>@include('web.albums.delete_from_list')</td>
		      </tr>
		      @endforeach

		    </tbody>
		  </table>
        </div>
     </div>
 </section>



@stop
