@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Marketing Page</title>
    </head>
    <body class="marketing-background">
        <!-- <img src="img/hurricaneLogo.png" alt="Hurricane Logo"> -->
        <div class="marketing-content">
            <div class="logo-title">
                <h4 class="marketing-title">
                <img id="marketing-logo" src="img/logo.png" class="img-fluid" alt="Hurricane Logo">
                Hurricane</h4>

            </div>

            <h1 class="marketing-catchphrase">Take the world by storm.</h1>
            <div>
                <img src="img/wave.png" class="img-fluid" alt="Hurricane Coverphoto">
            </div>
            <h4 class="marketing-features">Create an account today.</h4>
            <a href="{{ route('register') }}">
                <button id="marketing-button" name="button" class="btn btn-outline-light btn-lg" role="button">Sign Up</button>
            </a>
            <a href="{{ route('login') }}">
                <button id="marketing-button" name="button" class="btn btn-outline-light btn-lg" role="button">Login</button>
            </a>
            <div class="container">
              <div id="marketing-columns" class="row">
                <div class="col-sm">
                  Follow your interests.
                </div>
                <div class="col-sm">
                  Hear what people are talking about.
                </div>
                <div class="col-sm">
                  Join the conversation.
                </div>
              </div>
            </div>
        </div>
    </body>
</html>
@endsection
