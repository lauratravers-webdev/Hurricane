<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TweetLike;
use Auth;

class TweetLikeController extends Controller
{
    public function saveLikes(Request $request)
        {
            // Get user.
            $user = Auth::user();
            $userId = $user->id;

            // Get follower.
            $postId = $request->tweet_id;

            // Check follow status..
            $tweetLikeId = $this::checkFollowing( $postId ); # SEE METHOD: App\FollowersController->checkFollowing

            // If you are already following...
            if ( $tweetLikeId )
            {
                // Get this follower...
                $likeModel = TweetLike::find( $tweetLikeId );
                // Unfollow!
                $likeModel->delete();
            }
            // If you are not yet following...
            else
            {
                // Build a new follower instance.
                $likeModel = new TweetLike();
                // Populate values...
                $likeModel->user_id = $userId;
                $likeModel->tweet_id = $postId;
                // Follow the user!!!
                $likeModel->save();
            }

            // Return the view.
            return redirect('/home');
        }

        public static function checkFollowing( $postId=0 )
        {
            // Get user.
            $user = Auth::user();
            $userId = $user->id;

            // If the ID passed in was a string, attempt to convert to an integer.
            if ( is_string( $postId ) ) $postId = (Integer) $postId;

            // If the value is default (0), just set to FALSE as we cannot use it.
            if ( $postId <= 0 ) $postId = FALSE;

            // If they are already following...
            if ( is_integer( $postId ) )
            {
                // See if there is an entry in the Followers for this user and the follow(ed) user.
                if ( $checkFollowing = TweetLike::where( 'user_id', $userId )->where( 'tweet_id', $postId )->first() )
                {
                    // Send back the ID!
                    return $checkFollowing->id;
                }
            }
            // If they are NOT already following...
            return FALSE; // Send back FALSE!
        }
    }
