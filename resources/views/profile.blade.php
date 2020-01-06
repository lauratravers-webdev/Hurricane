@extends('layouts.app')
@section('content')
<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <body>
            <div class="container-fluid">
                <div class="row" >
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
                             <button id="sidenav-btn" class="btn btn-primary" type="button" name="button">Tweet</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6" id="middle-column">
                        <div class="tweetEntry-tweetHolder">
                        <h1 class="tweetEntry" style="margin-bottom:0px; margin-left: 10px;">Home</h1>
                        <form class="" action="/tweet" method="post">
                            @csrf
                            <textarea name="tweet" class="form-control"></textarea>


                            <button id="tweet-btn" class="btn btn-primary" type="submit" name="button">Submit</button>
                            <!-- <button id="tweet-btn" class="btn btn-primary" type="submit" name="button">Add GIF</button> -->

                            <!-- Trigger the modal with a button -->
                            <button id="tweet-btn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add GIF</button>

                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add GIF</h4>
                                  </div>
                                  <div class="modal-body">
                                      <!--Giphy popup/search bar/post-->
                                    <p>



                                    </p>
                                    <!--end of giphy search and post-->
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  </div>
                                </div>

                              </div>
                            </div>




                        </form>
                        <!---------------------------------------->
                        @foreach($tweets as $tweet)

                        <!-- Middle feed -->
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
                                    <div class="tweetEntry-text-container">
                                        <div class="recent-tweets">
                                            <p><b>Comments</b></p>
                                            @foreach($tweet->comment as $comment)
                                            {{ $comment->comment }}<br>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tweetEntry-action-list" style="line-height:24px;color: #b1bbc3;">
                                        <!-- Button trigger modal -->
                                        <button id="comment-button" type="button" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fa fa-comment" style="width: 80px"></i>
                                        </button>
                                        <i class="fa fa-retweet" style="width: 80px"></i>
                                        <i class="fa fa-heart" style="width: 80px"></i>
                                    </div>
                                    <!-- COMMENTS -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <button type="submit" class="btn btn-primary" name="button">GIF</button>

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
                    <div class="col-md-3 col-sm-3" id="right-column">
                        <!--Followers-->
                       <h1 class="tweetEntry" style="margin-bottom:0px; margin-left: 10px;">People to Follow</h1>
                       @foreach($users as $user)
                       {{ $user->name }}
                       <form class="submit" action="/follow" method="post">
                           @csrf
                           <input type="hidden" name="follower_id" value="{{ $user->id }}">

                           <button type="submit" name="button">Follow</button>
                       </form>
                       <br>
                       @endforeach
               </div>
           </div>
       </div>
       <!--end of followers-->
                    </div>
                </div>

            </div>








    </body>

</html>
@endsection
