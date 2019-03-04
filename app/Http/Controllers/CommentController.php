<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    public function store(Post $post){

        $this->validate(request(),[
            'body' => 'required'
        ]);

        Comment::create([
            'body' => request('body'),
            'post_id' => $post->id
        ]);

        return back();
    }
}
