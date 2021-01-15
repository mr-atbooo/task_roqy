<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    {!! Html::style('resources/assets/cpanel/plugins/fontawesome-free/css/all.min.css') !!}
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

@yield('style')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('resources/assets/cpanel/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="shortcut icon" href="{{url('resources/assets/cpanel/images/pages/')}}">
</head>

<style>
    /******* this code for hid export buttons *******/
    div.dt-buttons {
        display: none;
    }
</style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
