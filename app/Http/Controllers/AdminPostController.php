<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Post\PostStoreRequest;
use App\Http\Requests\Post\PostUpdateRequest;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50),
        ]);
    }

    public function create()
    {
        return view('admin.posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(PostStoreRequest $request)
    {
        $data = $request->validated();

        // Upload Thumbnail
        $data['thumbnail'] = $request->thumbnail ? Storage::disk('public')->put('thumbnails', $request->file('thumbnail')) : null;

        if ($post = Post::create($data)) {
            return redirect()
                ->route('posts.show', $post->slug)
                ->with('success', 'Post Added successfully');
        }

        return back()->with('error', 'Failed to add the Post');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        $data = $request->validated();

        // Upload Thumbnail
        $data['thumbnail'] = $request->thumbnail ? Storage::disk('public')->put('thumbnails', $request->file('thumbnail')) : null;

        if ($post->update($data)) {
            return redirect()
                ->route('admin.posts.index')
                ->with('success', 'Post Updated successfully');
        }

        return back()->with('error', 'Failed to add the Post');
    }

    public function destroy(Post $post)
    {
        if (
            $post->thumbnail &&
            Storage::disk('public')->exists($post->thumbnail) &&
            ! Storage::disk('public')->delete($post->thumbnail)
        ) return back()->with('error', 'Failed to delete the Post Thumbnail');

        if ($post->delete())
            return back()->with('success', 'Post Deleted Successfully');

        return back()->with('error', 'Failed to delete the Post');
    }
}
