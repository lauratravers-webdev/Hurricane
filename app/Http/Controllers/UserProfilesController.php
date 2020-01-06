<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Tweet;
use \App\User;

class UserProfilesController extends Controller
{
    public function index()
    {

        $tweetModel = new Tweet();
        $tweets = $tweetModel->orderBy('created_at', 'DESC')->with('comment')->get();
        $users = User::all();

        // var_dump($tweets); die();

        return view('profile', compact('tweets', 'users'));
    }


}
