<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Majoo Teknologi Indonesia - Login Page</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/auth.css') }}">

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head>
<body>
    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="{{ asset('avatar_2x.png') }}" />
            <p id="profile-name" class="profile-name-card"></p>
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-styled-right alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            <form class="form-signin" method="POST" action="{{ route('register') }}">
                @csrf
                <span id="reauth-email" class="reauth-email"></span>
                <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus placeholder="Nama">
                <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Register</button>
            </form><!-- /form -->
            <a href="{{ route('login') }}" class="forgot-password">
                Login
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
</body>
</html>