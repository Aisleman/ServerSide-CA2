@extends('layouts.app')

@section('content')
    <div class="max-w-5xl mx-auto px-6 py-10">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            {{-- Post Image --}}
            @if ($post->image_path)
                <img src="{{ asset('storage/' . $post->image_path) }}"
                     alt="{{ $post->title }}"
                     class="w-full h-96 object-cover object-center">
            @endif

            <div class="p-8">
                {{-- Post Title --}}
                <h1 class="text-4xl font-extrabold text-yellow-800 mb-4 leading-snug">
                    {{ $post->title }}
                </h1>

                {{-- Meta Info --}}
                <div class="flex items-center text-sm text-gray-600 mb-6">
                    <span class="font-semibold text-gray-800">{{ $post->user->name }}</span>
                    <span class="mx-2">•</span>
                    <span>Published on {{ date('jS M Y', strtotime($post->updated_at)) }}</span>
                </div>

                {{-- Description (render HTML like iframe) --}}
                <div class="text-lg text-gray-700 leading-relaxed">
                    {!! nl2br($post->description) !!}
                </div>

                {{-- YouTube Embed (if video ID exists) --}}
                @if (!empty($post->youtube_video_id))
                    <div class="mt-8">
                        <iframe width="100%" height="360"
                                src="https://www.youtube.com/embed/{{ $post->youtube_video_id }}"
                                frameborder="0" allowfullscreen
                                class="rounded shadow-md">
                        </iframe>
                    </div>
                @endif

                {{-- Back Link --}}
                <div class="mt-10">
                    <a href="{{ route('blogs.index') }}"
                       class="inline-block bg-yellow-800 hover:bg-yellow-900 text-white text-sm px-6 py-2 rounded-full transition duration-300 shadow">
                        ← Back to All Posts
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
