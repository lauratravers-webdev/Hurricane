<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Tweet;
use \App\Comment;
use \App\User;
use \App\TweetLike;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tweetModel = new Tweet();
        // $tweets = Tweet::all();
        $tweets = $tweetModel->with('comment')->get();
        $users = User::all();

        // var_dump($tweets);
        return view('home', compact('tweets', 'users'));
    }

    public function marketing()
    {
        return view('marketing');
    }
}



///////////////////////////////////////////////////////////////////LIKE
