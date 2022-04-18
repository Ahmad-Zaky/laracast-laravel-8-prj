<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => $this->getPosts(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function getPosts()
    {
        return Post::latest('id')->filter(request(['search', 'category', 'author']))->paginate(3)->withQueryString();
    }
}
