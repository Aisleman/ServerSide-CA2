@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6" x-data="{ modalSlug: null }">
        <h1 class="text-3xl font-bold mb-6">Pending Blog Posts</h1>

        @if($posts->isEmpty())
            <p class="text-gray-600">No pending posts at the moment.</p>
        @else
            <div class="space-y-4">
                @foreach($posts as $post)
                    <div class="bg-white p-6 rounded shadow-md">
                        <h2 class="text-2xl font-semibold mb-2">{{ $post->title }}</h2>
                        <p class="text-sm text-gray-500 mb-4">
                            Submitted by: <span class="font-medium">{{ $post->user->name }}</span>
                        </p>
                        <p class="mb-4">{{ Str::limit($post->description, 200) }}</p>

                        @if ($post->image_path)
                            <img src="{{ asset('storage/' . $post->image_path) }}" alt="Image" class="w-64 mb-4 rounded">
                        @endif

                        <div class="flex gap-4">
                            <button @click="modalSlug = 'approve-{{ $post->slug }}'" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                                ✅ Approve
                            </button>

                            <button @click="modalSlug = 'decline-{{ $post->slug }}'" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                                ❌ Decline
                            </button>
                        </div>
                    </div>

                    <!-- Approve Modal -->
                    <div x-show="modalSlug === 'approve-{{ $post->slug }}'" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" style="display: none;">
                        <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
                            <h2 class="text-xl font-bold mb-2">Approve Blog</h2>
                            <p>Are you sure you want to approve <strong>{{ $post->title }}</strong>?</p>
                            <div class="mt-4 flex justify-end gap-2">
                                <button @click="modalSlug = null" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Cancel</button>
                                <form action="{{ route('blogs.approve', $post->slug) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Approve</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Decline Modal -->
                    <div x-show="modalSlug === 'decline-{{ $post->slug }}'" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" style="display: none;">
                        <div class="bg-white p-6 rounded shadow-lg w-full max-w-md">
                            <h2 class="text-xl font-bold mb-2">Decline Blog</h2>
                            <p>Are you sure you want to decline <strong>{{ $post->title }}</strong>?</p>
                            <div class="mt-4 flex justify-end gap-2">
                                <button @click="modalSlug = null" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Cancel</button>
                                <form action="{{ route('blogs.decline', $post->slug) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Decline</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
