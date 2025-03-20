<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $posts = Post::orderBy('updated_at', 'DESC')->get();
        return view('blog.index', compact('posts'));
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        $image = $request->file('image');
        $originalName = time() . '_' . $image->getClientOriginalName();
        $imagePath = $image->storeAs('images', $originalName, 'public');

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => 'images/' . $originalName,
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('blogs.index')->with('success', 'Post created successfully!');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('blog.show', compact('post'));
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        if ($post->user_id !== Auth::id()) {
            return redirect()->route('blogs.index')->with('error', 'You are not authorized to edit this post.');
        }

        return view('blog.edit', compact('post'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $post = Post::where('slug', $slug)->firstOrFail();

        if ($post->user_id !== Auth::id()) {
            return redirect()->route('blogs.index')->with('error', 'You are not authorized to update this post.');
        }

        $newSlug = $post->slug;
        if ($post->title !== $request->title) {
            $newSlug = SlugService::createSlug(Post::class, 'slug', $request->title);
        }

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => $newSlug,
            'updated_at' => now(),
        ]);

        return redirect()->route('blogs.index')->with('success', 'Post updated successfully!');
    }

    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        if ($post->user_id !== Auth::id()) {
            return redirect()->route('blogs.index')->with('error', 'You are not authorized to delete this post.');
        }

        if (Storage::exists('public/' . $post->image_path)) {
            Storage::delete('public/' . $post->image_path);
        }

        $post->delete();

        return redirect()->route('blogs.index')->with('success', 'Post deleted successfully!');
    }
}
