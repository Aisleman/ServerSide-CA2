@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto py-12 px-6">
        <h1 class="text-4xl font-bold text-yellow-800 mb-6">Contact Us</h1>

        <p class="text-lg text-gray-700 mb-4">
            Got questions, feedback, or just want to vibe with us? You can reach out through any of our socials below.
        </p>

        <ul class="space-y-3 text-lg text-gray-800">
            <li>
                📧 <strong>Email:</strong> afrobeatsblog@gmail.com
            </li>
            <li>
                🐦 <strong>Twitter:</strong> <a href="https://twitter.com/afrobeatsblog" class="text-yellow-700 hover:underline" target="_blank">@afrobeatsblog</a>
            </li>
            <li>
                📸 <strong>Instagram:</strong> <a href="https://instagram.com/afrobeatsblog" class="text-yellow-700 hover:underline" target="_blank">@afrobeatsblog</a>
            </li>
            <li>
                📘 <strong>Facebook:</strong> <a href="https://facebook.com/afrobeatsblog" class="text-yellow-700 hover:underline" target="_blank">Afrobeats Blog</a>
            </li>
            <li>
                🎵 <strong>TikTok:</strong> <a href="https://tiktok.com/@afrobeatsblog" class="text-yellow-700 hover:underline" target="_blank">@afrobeatsblog</a>
            </li>
        </ul>

        <div class="mt-8">
            <a href="{{ url('/') }}" class="inline-block bg-yellow-800 hover:bg-yellow-900 text-white text-sm px-6 py-2 rounded-full transition duration-300 shadow">
                ← Back to Home
            </a>
        </div>
    </div>
@endsection
