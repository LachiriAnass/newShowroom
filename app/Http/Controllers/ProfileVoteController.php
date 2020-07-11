<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ProfileVote;

class ProfileVoteController extends Controller
{
    public function manageUpvote($user_id, $profile_id)
    {
        if($user_id != Auth::user()->id){
            return back();
        }

        $profilevote = ProfileVote::where('user_id', '=', $user_id)->where('profile_id', '=', $profile_id)->first();

        if($profilevote){
            if($profilevote->vote_type){
                $profilevote->delete();
                return back();
            }else{
                $profilevote->vote_type = true;
                $profilevote->save();
                return back();
            }
        }

        $profileupvote = new ProfileVote();
        $profileupvote->vote_type = true;
        $profileupvote->user_id = $user_id;
        $profileupvote->profile_id = $profile_id;
        $profileupvote->save();
        return back();

    }

    public function manageDownvote($user_id, $profile_id)
    {
        if($user_id != Auth::user()->id){
            return back();
        }

        $profilevote = ProfileVote::where('user_id', '=', $user_id)->where('profile_id', '=', $profile_id)->first();

        if($profilevote){
            if(!$profilevote->vote_type){
                $profilevote->delete();
                return back();
            }else{
                $profilevote->vote_type = false;
                $profilevote->save();
                return back();
            }
        }

        $profileupvote = new ProfileVote();
        $profileupvote->vote_type = false;
        $profileupvote->user_id = $user_id;
        $profileupvote->profile_id = $profile_id;
        $profileupvote->save();
        return back();

    }
}
