<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    public function comment(){
        return $this->hasMany('App\Comment');
    }

    public function like(){
        return $this->hasMany('App\TweetLike');;
    }
}
