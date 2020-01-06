@extends('layouts.app')
@section('content')
<?php use App\Follower; ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Hurricane</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-3" id="left-column">
                    <div class="sidebar">
                        <div class="sidenav">
                            <a href="#home"><i class="fa fa-home" style="font-size:25px;"> </i> Home</a>
                            <a href="#explore"><i class="fa fa-hashtag" style="font-size:25px;"> </i> Explore</a>
                            <a href="#notifications"> <i class="fa fa-bell" style="font-size:25px;"></i> Notifications</a>
                            <a href="#messages"><i class="fa fa-envelope" style="font-size:25px;"> </i>Messages</a>
                            <a href="#bookmarks"><i class="fa fa-bookmark" style="font-size:25px;"> </i>Bookmarks</a>
                            <a href="#lists"><i class="fa fa-list" style="font-size:25px;"></i>Lists</a>
                            <a href="#profile"><i class="fa fa-user-circle" style="font-size:25px;"> </i>Profile</a>
                            <a href="#more"><i class="fa fa-plus-circle" style="font-size:25px;"> </i>More</a>
                            <button id="sidenav-btn" class="btn btn-primary" type="button" name="button">Post</button>
                        </div>
                    </div>
                </div>
                <!--MIDDLE COLUMN-->

                <div class="col-md-6 col-sm-6" id="middle-column">
                    <!--Tweet box-->
                    <div id="tweetEntry-tweetHolder" class="tweetEntry-tweetHolder">
                        <h1 class="tweetEntry" style="margin-bottom:0px; margin-left: 10px;">Home</h1>
                        <form class="" action="/tweet" method="post">
                            @csrf
                            <textarea name="tweet" class="form-control"></textarea>
                            <!--submit button-->
                            <button id="tweet-btn" class="btn btn-primary" type="submit" name="button">Submit</button>

                            <!-- GIF Modal button-->
                            <button id="tweet-btn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $modalId = uniqid( 'comment-modal-' ); ?>">Add GIF</button>

                            <!-- Modal -->
                            <div id="<?php echo $modalId ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Add GIF</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <!--Giphy popup/search bar/post-->
                                            <p>
                                                <div class="giphy">
                                                    <giphy-results></giphy-results>
                                                </div>
                                            </p>
                                            <!--end of giphy search and post-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!---------------------------------------->
                        <!--Tweet display middle feed-->
                        @foreach($tweets as $tweet)
                        <div class="tweetEntry">
                            <div class="tweetEntry-content">
                                <!--Show tweet-->
                                <a class="tweetEntry-account-group" href="/profile">
                                    <img class="tweetEntry-avatar" src="http://placekitten.com/200/200">
                                    <strong class="tweetEntry-fullname">
                                </strong>
                                    <span class="tweetEntry-username">
                                <b>{{ $tweet->user_id }}</b>
                                </span>
                                    <span class="tweetEntry-timestamp">
                                {{$tweet->created_at}}
                                </span>
                                </a>
                                <div class="tweetEntry-text-container">
                                    <div class="recent-tweets">
                                        <p><b>Post</b></p>
                                        {{$tweet->tweet}}
                                    </div>
                                    <!---end show tweet-->
                                    <br>
                                    <!--show comment-->
                                    <a class="tweetEntry-account-group" href="/profile">
                                        <img class="tweetEntry-avatar" src="https://static.scientificamerican.com/sciam/cache/file/D059BC4A-CCF3-4495-849ABBAFAED10456_source.jpg?w=590&h=800&526ED1E1-34FF-4472-B348B8B4769AB2A1">
                                        <strong class="tweetEntry-fullname">
                                    </strong>
                                        <span class="tweetEntry-username">
                                    <b>{{ $tweet->user_id }}</b>
                                    </span>
                                        <span class="tweetEntry-timestamp">
                                    {{$tweet->created_at}}
                                    </span>
                                    </a>
                                    <!--COMMENTS-->
                                    <div class="tweetEntry-text-container">
                                        <div class="recent-tweets">
                                            <p><b>Comments</b></p>
                                            @foreach($tweet->comment as $comment) {{ $comment->comment }}
                                            <br> @endforeach
                                        </div>
                                    </div>
                                    <!--comment/retweet/like buttons-->
                                    <div class="tweetEntry-action-list">
                                        <!-- Button trigger modal -->
                                        <button id="comment-button" type="button" data-toggle="modal" data-target="#<?php echo $modalId = uniqid( 'comment-modal-' ); ?>">
                                            <i class="fa fa-comment"></i>
                                        </button>
                                        <i class="fa fa-retweet"></i>


                                        <!--LIKE BUTTON-->
                                        <form class="submit" action="/like" method="get">
                                            @csrf
                                            <input  type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                                            @if (App\Http\Controllers\TweetLikeController::checkFollowing($tweet->id))
                                            <button id="like-button" type="submit" name="button">
                                                <!--Unlike-->
                                                <i  class="fa fa-thumbs-down"></i>
                                            </button>
                                            @else
                                            <!--like-->
                                            <button id="like-button" type="submit" name="button">
                                                <i class="fa fa-thumbs-up"></i>
                                            </button>
                                            @endif
                                        </form>
                                        <!--end of like button-->




                                    </div>
                                    <!-- COMMENTS MODAL BUTTON-->
                                    <div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="commentEntry-commentHolder">
                                                        <form class="" action="/comment" method="post">
                                                            @csrf
                                                            <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                                                            <textarea name="comment" rows="4" class="form-control" style="width: 300px; margin-left:50px;"></textarea>
                                                            <br>
                                                            <button type="submit" class="btn btn-primary" name="button">Comment</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>

                </div>
                <!--Followers-->
                <div class="col-md-3 col-sm-3" id="right-column">
                    <h1 class="tweetEntry" style="margin-bottom:0px; margin-left: 10px;">People to Follow</h1>
                    @foreach($users as $user)
                    {{ $user->name }}
                    <form class="submit" action="/follow" method="get">
                        @csrf
                        <input type="hidden" name="follower_id" value="{{ $user->id }}">
                        @if (App\Http\Controllers\FollowersController::checkFollowing($user->id))
                        <button class="following-btn" type="submit" name="button">
                            Following</button>
                        @else
                        <button class="follow-btn" type="submit" name="button">
                            Follow</button>
                        @endif
                    </form>
                    <br>
                    @endforeach
                    <!--end of followers-->
                </div>
            </div>
        </div>
    </body>
</html>
@endsection
