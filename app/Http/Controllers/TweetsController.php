<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use \App\Tweet;
use \App\Comment;

class TweetsController extends Controller
{
    public function saveTweet(Request $request){
        $user = Auth::user();
        $userId = $user->id;
        $newTweet = $request->tweet;
        // var_dump($request->tweet);

        $tweetModel = new Tweet();
        $tweetModel->user_id = $userId;
        $tweetModel->tweet = $newTweet;
        $tweetModel->save();
        return redirect('/home');


    }

    public function saveComment(Request $request){
        $user = Auth::user();
        $userId = $user->id;
        $newComment = $request->comment;
        $tweetId = $request->tweet_id;


        $commentModel = new Comment();
        $commentModel->user_id = $userId;
        $commentModel->tweet_id = $tweetId;
        $commentModel->comment = $newComment;
        $commentModel->save();
        return redirect('/home');


    }

    public function getTweets(){
        $allTweets = Tweet::all();
        $allTweetsJson = json_encode($allTweets);
        return $allTweetsJson;
    }
}
