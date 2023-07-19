<?php

namespace App\Http\Controllers;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function add()
    {
        return view('v_add');
    }

    public function insert(Request $req)
    {
        $video = new Video;
        $video->title = $req->name;
        $video->description = $req->des;
        $video->save();
        return redirect()->route('show_video'); 
    }

    public function list()
    {
        $videos = Video::all();
        return view('videoList', compact('videos'));
    }

    public function addComment(Request $req)
    {
        $video = Video::find($req->id);
        return view('addVideoComment', compact('video'));
    }

    public function CommentStore(Request $req)
    {
        $comment = new Comment();
        $comment->content = $req->comment;
        // $comment->save();
        $video = Video::find($req->id);
        $video->comments()->save($comment);
        return redirect()->route('show_video');
    }
}
