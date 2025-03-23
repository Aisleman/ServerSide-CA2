@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto py-10 px-6">
        <h1 class="text-3xl font-bold text-yellow-900 mb-6">Your Profile</h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-4">
                <p class="text-sm text-gray-500">Full Name</p>
                <p class="text-lg font-semibold text-gray-900">{{ $user->name }}</p>
            </div>

            <div class="mb-4">
                <p class="text-sm text-gray-500">Email Address</p>
                <p class="text-lg font-semibold text-gray-900">{{ $user->email }}</p>
            </div>

            <div>
                <p class="text-sm text-gray-500">Role</p>
                <span class="inline-block px-3 py-1 text-sm rounded-full bg-yellow-100 text-yellow-800 font-semibold">
                {{ ucfirst($user->role) }}
            </span>
            </div>
        </div>

        <div class="mt-6 text-right">
            <a href="{{ route('profile.edit') }}"
               class="inline-flex items-center gap-2 bg-yellow-800 hover:bg-yellow-700 text-white font-semibold px-5 py-2 rounded transition">
                ✏️ Edit Profile
            </a>
        </div>
    </div>
@endsection
