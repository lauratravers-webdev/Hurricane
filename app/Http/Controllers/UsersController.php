<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UsersController extends Controller
{
    public function getUsers(){
        return json_encode(User::all());
    }

    public function followUser(){
        
    }
}
