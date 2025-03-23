@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-10 border-b border-gray-200">
            <h1 class="text-5xl font-bold text-gray-800">
                Blog Posts
            </h1>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="w-4/5 m-auto mt-6">
            <p class="w-fit px-6 py-3 bg-green-500 text-white rounded-full shadow">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif

    @if (Auth::check())
        <div class="w-4/5 m-auto text-right mt-6">
            <a href="{{ route('blogs.create') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white uppercase text-sm font-semibold py-2 px-4 rounded-full shadow">
                + Create Post
            </a>
        </div>
    @endif

    @foreach ($posts as $post)
        <div class="grid md:grid-cols-2 gap-8 w-4/5 mx-auto mt-12 items-center bg-white p-6 rounded-xl shadow">
            <div>
                <img src="{{ asset('storage/' . $post->image_path) }}"
                     alt="{{ $post->title }}"
                     class="rounded-lg w-full h-64 object-cover shadow">
            </div>
            <div>
                <h2 class="text-3xl font-extrabold text-gray-800 mb-2">
                    {{ $post->title }}
                </h2>
                <p class="text-sm text-gray-500 mb-4">
                    By <span class="font-bold text-gray-700">{{ $post->user->name }}</span>,
                    Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
                </p>

                <p class="text-gray-700 leading-relaxed mb-6">
                    {{ Str::limit($post->description, 200) }}
                </p>

                <div class="flex justify-between items-center">
                    <a href="{{ route('blogs.show', $post->slug) }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold py-2 px-4 rounded-full shadow">
                        Keep Reading
                    </a>

                    @if (Auth::check() && (Auth::user()->id == $post->user_id || in_array(Auth::user()->role, ['admin', 'editor'])))
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('blogs.edit', $post->slug) }}"
                               class="text-yellow-700 hover:underline font-semibold text-sm">
                                ✏️ Edit
                            </a>

                            <form action="{{ route('blogs.destroy', $post->slug) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this post?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline font-semibold text-sm">
                                    🗑 Delete
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@endsection
