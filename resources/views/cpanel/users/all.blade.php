@extends('cpanel.index')

@section('all')

@section('title')
    {{__('home.users')}}
@stop
@section('style')
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{url('resources/assets/cpanel/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{url('resources/assets/cpanel/plugins/toastr/toastr.min.css')}}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('resources/assets/cpanel/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('resources/assets/cpanel/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

@stop


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('home.users')}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}"> {{__('home.dashboard')}} </a></li>
                        <li class="breadcrumb-item active">{{__('home.users')}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            @can('add User')
                                <a type="button" class=" btn bg-green" href="{{route('users-create')}}" style="float: right;">
                                    {{__('home.add')}} {{__('home.users')}}
                                </a>
                            @endcan
                            @can('export User')
                                <button  type="button" class=" btn bg-green trigger_buttons" style="float: right;margin-right: 10px;">{{__('home.export')}}</button>
                            @endcan

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            @if(session()->get('done'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h5><i class="icon fas fa-check"></i> {{session()->get('done')}}</h5>
                                </div>
                            @endif
                            @if(session()->get('fail'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h5><i class="icon fas fa-ban"></i> {{session()->get('fail')}}</h5>
                                    </div>
                            @endif



                                {!! Form::open(['route'=>'users-delete'])!!}
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th><input class="" type="checkbox" id="checkAll"></th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>photo</th>
                                        <th>Date</th>
                                        @can('edit User')
                                            <th>Edit</th>
                                        @endcan

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        <tr>
                                            <td><input class="" name="id[]" value="{{$item->id}}" type="checkbox"></td>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                @if($item->roles->count() > 0)
                                                    @foreach($item->roles->pluck('name') as $name)
                                                        {{$name}}
                                                    @endforeach
                                                @else
                                                    User
                                                @endif
                                            </td>
                                            <td>
                                                <img class='img' src='{{url('resources/assets/cpanel/images/users/'.$item->avatar)}}' style='width:50px;height:50px;'>
                                            </td>


                                            <td>{{date('Y-m-d',strtotime($item->created_at))}}</td>
                                            @can('edit User')
                                                <td><a href="{{route('users-edit',$item->id)}}" class="btn btn-info"><i class="fa fa-edit"></i> </a></td>
                                            @endcan
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @can('delete User')
                                    <button type="submit" class="btn btn-danger del">Delete</button>
                                @endcan
                                {!! Form::close()!!}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@section('footer')
    <!-- SweetAlert2 -->
    <script src="{{url('resources/assets/cpanel/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <!-- Toastr -->
    <script src="{{url('resources/assets/cpanel/plugins/toastr/toastr.min.js')}}"></script>


    <!-- St DataTables -->
    <script src="{{url('resources/assets/cpanel/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('resources/assets/cpanel/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('resources/assets/cpanel/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('resources/assets/cpanel/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

    <!-- St DataTables Buttons -->
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js "></script>
    <!-- Nd DataTables -->

    <!-- AdminLTE App -->
    <script src="{{url('resources/assets/cpanel/dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('resources/assets/cpanel/dist/js/demo.js')}}"></script>
    <!-- page script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]

                // "paging": true,
                // "lengthChange": false,
                // "searching": false,
                // "ordering": true,
                // "info": true,
            });

        });


        /*********** st show and hide buttons**********/
        jQuery('.trigger_buttons').on('click', function(event) {
            jQuery('div.dt-buttons').toggle('show');
        });
        /*********** nd show and hide buttons**********/
        $("#checkAll").click(function (e) {
            $('input:checkbox').not(this).prop('checked', this.checked);
            e.stopPropagation();
        });

        /****************** start code for Warning Message  ************/
        $('.del').on('click',function(e)
        {
            if(!confirm('Do you want to delete this item?'))
            { e.preventDefault();}

        });
        /****************** start code for Warning Message  ************/
    </script>

@stop
@stop

