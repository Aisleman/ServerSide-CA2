@extends('layouts.app')

@section('content')
    <div class="w-4/5 m-auto text-left">
        <div class="py-15">
            <h1 class="text-5xl font-bold text-gray-800">
                Update Post
            </h1>
        </div>
    </div>

    @if ($errors->any())
        <div class="w-4/5 m-auto mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="w-full mb-3 text-red-700 bg-red-100 border-l-4 border-red-500 p-4 rounded">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="w-4/5 m-auto pt-10">
        <form
            action="{{ route('blogs.update', $post->slug) }}"
            method="POST"
            enctype="multipart/form-data"
            class="bg-white p-6 rounded-xl shadow">

            @csrf
            @method('PUT')

            <input
                type="text"
                name="title"
                value="{{ old('title', $post->title) }}"
                class="bg-transparent block border-b-2 w-full h-20 text-4xl outline-none mb-6"
                placeholder="Post Title"
                required>

            <textarea
                name="description"
                placeholder="Description..."
                class="bg-transparent block border-b-2 w-full h-60 text-lg outline-none mb-6"
                required>{{ old('description', $post->description) }}</textarea>

            <div class="flex items-center gap-4 mt-4">
                <button type="submit"
                        class="uppercase bg-yellow-700 hover:bg-yellow-800 text-white text-sm font-semibold py-3 px-6 rounded-full shadow">
                    Update Post
                </button>

                <a href="{{ route('blogs.index') }}"
                   class="text-gray-600 hover:text-gray-800 text-sm underline">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
