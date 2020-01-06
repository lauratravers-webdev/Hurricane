<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    public function follower(){
        return $this->belongsTo('App\User');
    }

    public function followerUser(Request $request){
        $user = Auth::user();
        $follower = new Follower();
        $follower->user_id = $user->id;
        $follower->follower_id = $request->follower_id;
        $follower->save();

        if ($follower->save()) {
            return "sucess";
        }
        else{
            return "error";
        }
    }

}
