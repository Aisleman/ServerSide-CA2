@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Pending Blog Posts</h1>

        @if($posts->isEmpty())
            <p class="text-gray-600">No pending posts at the moment.</p>
        @else
            <div class="space-y-4">
                @foreach($posts as $post)
                    <div class="bg-white p-6 rounded shadow-md">
                        <h2 class="text-2xl font-semibold mb-2">{{ $post->title }}</h2>
                        <p class="text-sm text-gray-500 mb-4">By User ID: {{ $post->user_id }} | Slug: {{ $post->slug }}</p>
                        <p class="mb-4">{{ Str::limit($post->description, 200) }}</p>

                        @if ($post->image_path)
                            <img src="{{ asset('storage/' . $post->image_path) }}" alt="Image" class="w-64 mb-4 rounded">
                        @endif

                        <div class="flex gap-4">
                            <form action="{{ route('blogs.approve', $post->id) }}" method="POST" onsubmit="return confirm('Approve this post?')">
                                @csrf
                                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                                    ✅ Approve
                                </button>
                            </form>

                            <form action="{{ route('blogs.decline', $post->id) }}" method="POST" onsubmit="return confirm('Decline this post?')">
                                @csrf
                                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                                    ❌ Decline
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
