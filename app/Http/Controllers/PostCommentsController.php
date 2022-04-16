<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\Comment\PostCommentStoreRequest;
use Auth;

class PostCommentsController extends Controller
{
    public function store(PostCommentStoreRequest $request, Post $post)
    {
        $data = $request->validated();
        
        if ($post->comments()->create([
            'user_id' => Auth::id(),
            'body' => $data['body'],
        ])) return back()->with('success', 'Your Comment has been Added');
        
        return back()->with('error', 'Your Comment Couldn\'t be added, please try again !');
    }
}
