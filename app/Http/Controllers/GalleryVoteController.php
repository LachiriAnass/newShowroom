<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\GalleryVote;
use App\Gallery;

class GalleryVoteController extends Controller
{
    public function manageUpvote($user_id, $gallery_id)
    {
        if($user_id != Auth::user()->id){
            return back();
        }
        $gallery = Gallery::findOrFail($gallery_id);

        $galleryvote = GalleryVote::where('user_id', '=', $user_id)->where('gallery_id', '=', $gallery_id)->first();

        if($galleryvote){
            if($galleryvote->vote_type){
                $galleryvote->delete();
                $gallery->votes_average -= 1;
                $gallery->save();
                return back();
            }else{
                $galleryvote->vote_type = true;
                $galleryvote->save();
                $gallery->votes_average += 2;
                $gallery->save();
                return back();
            }
        }

        $galleryupvote = new GalleryVote();
        $galleryupvote->vote_type = true;
        $galleryupvote->user_id = $user_id;
        $galleryupvote->gallery_id = $gallery_id;
        $galleryupvote->save();
        $gallery->votes_average += 1;
        $gallery->save();
        return back();

    }


    public function manageDownvote($user_id, $gallery_id)
    {
        if($user_id != Auth::user()->id){
            return back();
        }

        $gallery = Gallery::findOrFail($gallery_id);

        $galleryvote = GalleryVote::where('user_id', '=', $user_id)->where('gallery_id', '=', $gallery_id)->first();

        if($galleryvote){
            if(!$galleryvote->vote_type){
                $galleryvote->delete();
                $gallery->votes_average += 1;
                $gallery->save();
                return back();
            }else{
                $galleryvote->vote_type = false;
                $galleryvote->save();
                $gallery->votes_average -= 2;
                $gallery->save();
                return back();
            }
        }

        $galleryupvote = new GalleryVote();
        $galleryupvote->vote_type = false;
        $galleryupvote->user_id = $user_id;
        $galleryupvote->gallery_id = $gallery_id;
        $galleryupvote->save();
        $gallery->votes_average -= 1;
        $gallery->save();
        return back();

    }
}
