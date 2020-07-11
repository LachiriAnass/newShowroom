<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PaintingVote;

class PaintingVoteController extends Controller
{
    public function manageUpvote($user_id, $painting_id)
    {
        if($user_id != Auth::user()->id){
            return back();
        }

        $paintingvote = PaintingVote::where('user_id', '=', $user_id)->where('painting_id', '=', $painting_id)->first();

        if($paintingvote){
            if($paintingvote->vote_type){
                $paintingvote->delete();
                return back();
            }else{
                $paintingvote->vote_type = true;
                $paintingvote->save();
                return back();
            }
        }

        $paintingupvote = new PaintingVote();
        $paintingupvote->vote_type = true;
        $paintingupvote->user_id = $user_id;
        $paintingupvote->painting_id = $painting_id;
        $paintingupvote->save();
        return back();

    }


    public function manageDownvote($user_id, $painting_id)
    {
        if($user_id != Auth::user()->id){
            return back();
        }

        $paintingvote = PaintingVote::where('user_id', '=', $user_id)->where('painting_id', '=', $painting_id)->first();

        if($paintingvote){
            if(!$paintingvote->vote_type){
                $paintingvote->delete();
                return back();
            }else{
                $paintingvote->vote_type = false;
                $paintingvote->save();
                return back();
            }
        }

        $paintingupvote = new PaintingVote();
        $paintingupvote->vote_type = false;
        $paintingupvote->user_id = $user_id;
        $paintingupvote->painting_id = $painting_id;
        $paintingupvote->save();
        return back();

    }
}
