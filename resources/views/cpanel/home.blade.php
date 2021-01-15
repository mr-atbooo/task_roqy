@extends('cpanel.index')

@section('all')

@section('title')
    Dashboard
@stop


@section('style')

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{url('resources/assets/cpanel/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

@stop


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ @$albums->where('status','public')->count() }}</h3>

                            <p>Public Albums</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('albums')}}" class="small-box-footer">Public Albums <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ @$albums->where('status','private')->count() }}</h3>

                            <p>Private Albums</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{route('albums')}}" class="small-box-footer">Private Albums <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $users->where('type_user','user')->count() }}</h3>

                            <p>Users Count</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{route('users')}}" class="small-box-footer">Users Count<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $users->where('type_user','admin')->count() }}</h3>

                            <p>Admin</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{route('users')}}" class="small-box-footer">Admin <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

{{--            <div class="row" style="display: none">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="card">--}}

{{--                        <!-- /.card-header -->--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="row hide">--}}
{{--                                <div class="col-md-8">--}}
{{--                                    <p class="text-center">--}}
{{--                                        <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>--}}
{{--                                    </p>--}}

{{--                                    <div class="chart">--}}
{{--                                        <!-- Sales Chart Canvas -->--}}
{{--                                        <canvas id="salesChart" height="180" style="height: 180px;"></canvas>--}}
{{--                                    </div>--}}
{{--                                    <!-- /.chart-responsive -->--}}
{{--                                </div>--}}
{{--                                <!-- /.col -->--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <p class="text-center">--}}
{{--                                        <strong>Goal Completion</strong>--}}
{{--                                    </p>--}}

{{--                                    <div class="progress-group">--}}
{{--                                        Add Products to Cart--}}
{{--                                        <span class="float-right"><b>160</b>/200</span>--}}
{{--                                        <div class="progress progress-sm">--}}
{{--                                            <div class="progress-bar bg-primary" style="width: 80%"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!-- /.progress-group -->--}}

{{--                                    <div class="progress-group">--}}
{{--                                        Complete Purchase--}}
{{--                                        <span class="float-right"><b>310</b>/400</span>--}}
{{--                                        <div class="progress progress-sm">--}}
{{--                                            <div class="progress-bar bg-danger" style="width: 75%"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <!-- /.progress-group -->--}}
{{--                                    <div class="progress-group">--}}
{{--                                        <span class="progress-text">Visit Premium Page</span>--}}
{{--                                        <span class="float-right"><b>480</b>/800</span>--}}
{{--                                        <div class="progress progress-sm">--}}
{{--                                            <div class="progress-bar bg-success" style="width: 60%"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <!-- /.progress-group -->--}}
{{--                                    <div class="progress-group">--}}
{{--                                        Send Inquiries--}}
{{--                                        <span class="float-right"><b>250</b>/500</span>--}}
{{--                                        <div class="progress progress-sm">--}}
{{--                                            <div class="progress-bar bg-warning" style="width: 50%"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!-- /.progress-group -->--}}
{{--                                </div>--}}
{{--                                <!-- /.col -->--}}
{{--                            </div>--}}
{{--                            <!-- /.row -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- /.card -->--}}
{{--                </div>--}}
{{--                <!-- /.col -->--}}
{{--            </div>--}}
            <!-- /.row -->


        </div><!--. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@section('footer')
    <!-- REQUIRED SCRIPTS -->
    <!-- overlayScrollbars -->
    <script src="{{url('resources/assets/cpanel')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{url('resources/assets/cpanel')}}/dist/js/adminlte.js"></script>


    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{url('resources/assets/cpanel')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="{{url('resources/assets/cpanel')}}/plugins/raphael/raphael.min.js"></script>
    <script src="{{url('resources/assets/cpanel')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="{{url('resources/assets/cpanel')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="{{url('resources/assets/cpanel')}}/plugins/chart.js/Chart.min.js"></script>

    <!-- PAGE SCRIPTS -->
    <script src="{{url('resources/assets/cpanel')}}/dist/js/pages/dashboard2.js"></script>


@stop
@stop
