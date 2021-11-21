<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Majoo Teknologi Indonesia - Admin Page</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <style type="text/css">
        .navbar{
            background:#000;
        }
        .navbar-default .navbar-brand{
            color: #fff;
        }
    </style>

    @yield('css')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</head>
<body>

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    Majoo Teknologi Indonesia
                </a>
            </div>
        </div><!-- /.container-fluid -->
    </nav> 

    @yield('content')

    <div style="width: 100%;margin-top: 5em;">
        <hr style="border: 1px solid #000;">

        <div class="row">
            <div class="col-md-12 text-center">
                <p>2019 &copy; <a href="#" class="transition"> PT Majoo Teknologi Indonesia </a></p>
            </div>
        </div>
    </div>
    @yield('js')
</body>