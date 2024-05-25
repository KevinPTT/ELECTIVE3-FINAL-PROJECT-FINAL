<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Create a new post
        Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Update the post
        $post->update($validated);

        return redirect()->route('posts.show', $post)->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }
}
