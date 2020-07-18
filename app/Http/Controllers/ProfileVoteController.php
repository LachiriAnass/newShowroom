<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ProfileVote;
use App\User;

class ProfileVoteController extends Controller
{
    public function manageUpvote($user_id, $profile_id)
    {
        if($user_id != Auth::user()->id){
            return back();
        }

        $profile = User::findOrFail($profile_id);

        $profilevote = ProfileVote::where('user_id', '=', $user_id)->where('profile_id', '=', $profile_id)->first();

        if($profilevote){
            if($profilevote->vote_type){
                $profilevote->delete();
                $profile->votes_average -= 1;
                $profile->save();
                return back();
            }else{
                $profilevote->vote_type = true;
                $profilevote->save();
                $profile->votes_average += 2;
                $profile->save();
                return back();
            }
        }

        $profileupvote = new ProfileVote();
        $profileupvote->vote_type = true;
        $profileupvote->user_id = $user_id;
        $profileupvote->profile_id = $profile_id;
        $profileupvote->save();
        $profile->votes_average += 1;
        $profile->save();
        return back();

    }

    public function manageDownvote($user_id, $profile_id)
    {
        if($user_id != Auth::user()->id){
            return back();
        }


        $profile = User::findOrFail($profile_id);

        $profilevote = ProfileVote::where('user_id', '=', $user_id)->where('profile_id', '=', $profile_id)->first();

        if($profilevote){
            if(!$profilevote->vote_type){
                $profilevote->delete();
                $profile->votes_average += 1;
                $profile->save();
                return back();
            }else{
                $profilevote->vote_type = false;
                $profilevote->save();
                $profile->votes_average -= 2;
                $profile->save();
                return back();
            }
        }

        $profileupvote = new ProfileVote();
        $profileupvote->vote_type = false;
        $profileupvote->user_id = $user_id;
        $profileupvote->profile_id = $profile_id;
        $profileupvote->save();
        $profile->votes_average -= 1;
        $profile->save();
        return back();

    }
}
