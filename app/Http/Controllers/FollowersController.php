<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Follower;
use Auth;


class FollowersController extends Controller
{
    public function saveFollower(Request $request)
    {
        // Get user.
        $user = Auth::user();
        $userId = $user->id;

        // Get follower.
        $followerId = $request->follower_id;

        // Check follow status..
        $follower = $this::checkFollowing( $followerId ); # SEE METHOD: App\FollowersController->checkFollowing

        // If you are already following...
        if ( $follower )
        {
            // Get this follower...
            $followerModel = Follower::find( $follower );
            // Unfollow!
            $followerModel->delete();
        }
        // If you are not yet following...
        else
        {
            // Build a new follower instance.
            $followerModel = new Follower();
            // Populate values...
            $followerModel->user_id = $userId;
            $followerModel->follower_id = $followerId;
            // Follow the user!!!
            $followerModel->save();
        }

        // Return the view.
        return redirect('/home');
    }

    public static function checkFollowing( $followerId=0 )
    {
        // Get user.
        $user = Auth::user();
        $userId = $user->id;

        // If the ID passed in was a string, attempt to convert to an integer.
        if ( is_string( $followerId ) ) $followerId = (Integer) $followerId;

        // If the value is default (0), just set to FALSE as we cannot use it.
        if ( $followerId <= 0 ) $followerId = FALSE;

        // If they are already following...
        if ( is_integer( $followerId ) )
        {
            // See if there is an entry in the Followers for this user and the follow(ed) user.
            if ( $checkFollowing = Follower::where( 'user_id', $userId )->where( 'follower_id', $followerId )->first() )
            {
                // Send back the ID!
                return $checkFollowing->id;
            }
        }
        // If they are NOT already following...
        return FALSE; // Send back FALSE!
    }
}
