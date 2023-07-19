<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function add()
    {
        return view('p_add');
    }

    public function insert(Request $req)
    {
        $post = new Post;
        $post->title = $req->name;
        $post->description = $req->des;
        $post->save();
        return redirect()->route('show_post');
    }

    public function list()
    {
        $posts = Post::all();
        // $comments = Comment::all();
        return view('postList', compact('posts'));
    }

    public function addComment(Request $req)
    {
        $post = Post::find($req->id);
        return view('addPostCommet', compact('post'));
    }

    public function CommentStore(Request $req)
    {
        $comment = new Comment();
        $comment->content = $req->comment;
        // $comment->save();
        $post = Post::find($req->id);
        $post->comments()->save($comment);
        return redirect()->route('show_post');
    }

}
