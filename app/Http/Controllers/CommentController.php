<?php

namespace App\Http\Controllers;

use App\Models\Post;
use http\Message;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(Post $post)
    {
//add comment to post
       //validation
        request()->validate([
            'body'=>'required'
        ]);


    $post->comments()->create([
        'user_id'=>request()->user()->id,
        'body'=>request('body')

    ]);




         return back();
    }
}
