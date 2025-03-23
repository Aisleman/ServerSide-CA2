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
        $posts = Post::where('status', 'approved')->orderBy('updated_at', 'DESC')->get();
        return view('blogs.index', compact('posts'));
    }

    public function create()
    {
        return view('blogs.create');
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
            'status' => 'pending',
        ]);

        return redirect()->route('blogs.index')->with('success', 'Post submitted for review.');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('blogs.show', compact('post'));
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        if (Auth::user()->id !== $post->user_id && !in_array(Auth::user()->role, ['admin', 'editor'])) {
            return redirect()->route('blogs.index')->with('error', 'You are not authorized to edit this post.');
        }

        return view('blogs.edit', compact('post'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $post = Post::where('slug', $slug)->firstOrFail();

        if ($post->user_id !== Auth::id()) {
            return redirect()->route('blogs.index')->with('error', 'Unauthorized');
        }

        $newSlug = $post->slug;
        if ($request->title !== $post->title) {
            $newSlug = SlugService::createSlug(Post::class, 'slug', $request->title);
        }

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => $newSlug,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Post updated!');
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

    public function review()
    {
        $posts = Post::where('status', 'pending')->latest()->get();
        return view('blogs.review', compact('posts'));
    }

    public function approve($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->status = 'approved';
        $post->save();

        return redirect()->back()->with('success', 'Post approved successfully!');
    }

    public function decline($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->status = 'declined';
        $post->save();

        return redirect()->back()->with('success', 'Post declined successfully!');
    }
}
