<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/tweet', 'TweetsController@saveTweet');
Route::post('/comment', 'TweetsController@saveComment');
Route::post('/follow', 'FollowersController@saveFollower');
Route::get('/follow', 'FollowersController@saveFollower');
Route::get('/profile', 'UserProfilesController@index');
Route::get('/marketing', 'HomeController@marketing');
Route::get('/marketing', 'HomeController@marketing');


Route::get('/like', 'TweetLikeController@saveLikes');
