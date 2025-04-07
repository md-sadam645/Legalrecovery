<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <title>:: {{$title}} ::</title>
    <link rel="icon" href="https://legalrecovery.awd.world/images/logo/lr_favicon.png" type="image/x-icon">
    <!-- Favicon-->

    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{url('assets/backend/css/daterangepicker.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/backend/plugin/jvectormap/jquery-jvectormap-2.0.5.css')}}">

    <!-- project css file  -->
    <link rel="stylesheet" href="{{url('assets/backend/css/luno.style.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
</head>

<body class="layout-1" data-luno="theme-blue">

  @include('AdminLayout/header')

        <!-- start: page toolbar -->
        <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
            <div class="container-fluid">

                <div class="row mb-3 align-items-center">
                    <div class="col">
                        <ol class="breadcrumb bg-transparent mb-0">
                            <li class="breadcrumb-item"><a class="text-secondary" href="index.html">Home</a></li>
                            <li class="breadcrumb-item active"><a class="text-secondary" href="{{route('dashboard')}}">Dashboard</a></li>

                        </ol>
                    </div>
                </div> <!-- .row end -->
                {{-- <div class="row align-items-center">
                    <div class="col">
                        <h1 class="fs-5 color-900 mt-1 mb-0">Welcome back, Chris!</h1>
                        <small class="text-muted">You have 12 new messages and 7 new notifications.</small>
                    </div>
                    <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-7 col-sm-12 mt-2 mt-md-0">
                        <div class="input-group">
                            <input type="text" name="daterange" class="form-control">
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Send Report"><i class="fa fa-envelope"></i></button>
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Download Reports"><i class="fa fa-download"></i></button>
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Generate PDF"><i class="fa fa-file-pdf-o"></i></button>
                            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Share Dashboard"><i class="fa fa-share-alt"></i></button>
                        </div>
                    </div>
                </div>  --}}
                <!-- .row end -->

            </div>
        </div>
    @yield('content')
        
    @include('AdminLayout.footer')