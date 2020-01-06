<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TweetLike extends Model
{
    public function tweetLike(){
        return $this->belongsTo('App\Tweet');
    }

    public function followerUser(Request $request){
        $user = Auth::user();
        $likePost = new Like();
        $likePost->user_id = $user->id;
        $likePost->post_id = $request->post_id;
        $likePost->save();

        if ($likePost->save()) {

            return "sucess";
        }
        else{
            return "error";
        }
    }
}
