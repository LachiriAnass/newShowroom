<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\GalleryVote;

class GalleryVoteController extends Controller
{
    public function manageUpvote($user_id, $gallery_id)
    {
        if($user_id != Auth::user()->id){
            return back();
        }

        $galleryvote = GalleryVote::where('user_id', '=', $user_id)->where('gallery_id', '=', $gallery_id)->first();

        if($galleryvote){
            if($galleryvote->vote_type){
                $galleryvote->delete();
                return back();
            }else{
                $galleryvote->vote_type = true;
                $galleryvote->save();
                return back();
            }
        }

        $galleryupvote = new GalleryVote();
        $galleryupvote->vote_type = true;
        $galleryupvote->user_id = $user_id;
        $galleryupvote->gallery_id = $gallery_id;
        $galleryupvote->save();
        return back();

    }


    public function manageDownvote($user_id, $gallery_id)
    {
        if($user_id != Auth::user()->id){
            return back();
        }

        $galleryvote = GalleryVote::where('user_id', '=', $user_id)->where('gallery_id', '=', $gallery_id)->first();

        if($galleryvote){
            if(!$galleryvote->vote_type){
                $galleryvote->delete();
                return back();
            }else{
                $galleryvote->vote_type = false;
                $galleryvote->save();
                return back();
            }
        }

        $galleryupvote = new GalleryVote();
        $galleryupvote->vote_type = false;
        $galleryupvote->user_id = $user_id;
        $galleryupvote->gallery_id = $gallery_id;
        $galleryupvote->save();
        return back();

    }
}
