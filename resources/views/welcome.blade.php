@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Marketing Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="Hurricane" content="This is social media website to post, comment, GIF's, like.">
    </head>
    <body class="marketing-background">
        <!-- <img src="img/hurricaneLogo.png" alt="Hurricane Logo"> -->
        <div class="marketing-content">
            <div class="logo-title">
                <h4 class="marketing-title">
                <img id="marketing-logo" src="img/logo.png" class="img-fluid" alt="Hurricane Logo">
                Hurricane</h4>

            </div>

            <h1 title="Storm" class="marketing-catchphrase">Take the world by storm.</h1>
            <div>
                <img src="img/wave.png" class="img-fluid" alt="Hurricane Coverphoto">
            </div>
            <h4 title="Create" class="marketing-features">Create an account today.</h4>
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



            <div>
                <img class="img-divider" src="img/wave-long.png" alt="Waves">
            </div>



            <div class="container-fluid">
                <div id="split" class="row">
                    <div id="left" class="col-sm">
                        <p class="marketing-p">
                            Start the storm. POST whatever is on your mind. These posts can be shared around the world. Express yourself. Live your best life online. Or your worst you can be a troll if you want. But nice people are prefered.
                        </p>
                    </div>
                    <div id="right" class="col-sm">
                        <p class="marketing-p">
                            COMMENT on people's posts. Its revolutionary. You can always have the last word. Feel free to type lol on everything and you don't even have to laugh in real life.
                        </p>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div id="split" class="row">
                    <div id="left-2" class="col-sm">
                        <p class="marketing-p">
                            Search for GIF's to your hearts delight. Untill the cows come home. Until the fat lady sings. But maybe don't search for cows and fat lady GIFs its a scary world out there.
                        </p>
                    </div>
                    <div id="right-2" class="col-sm">
                        <p class="marketing-p">
                            LIKE your favourite posts. UNLIKE your favourite posts. Change your mind all you want. Drive a person crazy by liking and unliking thier posts. Make them reconsider the meaning of life.
                        </p>
                    </div>
                </div>
            </div>
    </body>
</html>
@endsection
