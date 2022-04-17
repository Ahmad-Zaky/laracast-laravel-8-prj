<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostStoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function create()
    {
        return view('posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(PostStoreRequest $request)
    {
        $data = $request->validated();

        // Upload Thumbnail
        $data['thumbnail'] = Storage::disk('public')->put('thumbnails', $request->file('thumbnail'));

        if ($post = Post::create($data)) {
            return redirect()
                ->route('posts.show', $post->slug)
                ->with('success', 'Post Added successfully');
        }

        return back()->with('error', 'Failed to add the Post');
    }

    public function getPosts()
    {
        return Post::latest('id')->filter(request(['search', 'category', 'author']))->paginate(3)->withQueryString();
    }
}
