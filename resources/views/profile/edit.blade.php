@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto py-10 px-6" x-data="{ section: 'none' }">
        <h1 class="text-3xl font-bold mb-6 text-yellow-900">Edit Profile</h1>

        <div class="space-y-4 mb-8">
            <button @click="section = 'name'" class="bg-yellow-800 text-white px-4 py-2 rounded hover:bg-yellow-700 w-full text-left">
                ✏️ Change Name
            </button>
            <button @click="section = 'email'" class="bg-yellow-800 text-white px-4 py-2 rounded hover:bg-yellow-700 w-full text-left">
                📧 Change Email
            </button>
            <button @click="section = 'password'" class="bg-yellow-800 text-white px-4 py-2 rounded hover:bg-yellow-700 w-full text-left">
                🔐 Change Password
            </button>
        </div>

        {{-- Name Form --}}
        <div x-show="section === 'name'" class="bg-white shadow rounded-lg p-6 mb-6" x-transition>
            <h2 class="text-lg font-semibold mb-4 text-gray-700">Change Name</h2>
            <form method="POST" action="{{ route('profile.update.name') }}">
                @csrf
                @method('PUT')

                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                       class="w-full px-4 py-2 border rounded mb-2 focus:outline-none focus:ring focus:border-yellow-400"
                       placeholder="Your new name">
                @error('name')
                <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
                @enderror

                <div class="flex justify-between">
                    <button type="submit" class="bg-yellow-800 text-white px-4 py-2 rounded hover:bg-yellow-700">Save</button>
                    <button type="button" @click="section = 'none'" class="text-sm text-gray-500 hover:underline">Cancel</button>
                </div>
            </form>
        </div>

        {{-- Email Form --}}
        <div x-show="section === 'email'" class="bg-white shadow rounded-lg p-6 mb-6" x-transition>
            <h2 class="text-lg font-semibold mb-4 text-gray-700">Change Email</h2>
            <form method="POST" action="{{ route('profile.update.email') }}">
                @csrf
                @method('PUT')

                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                       class="w-full px-4 py-2 border rounded mb-2 focus:outline-none focus:ring focus:border-yellow-400"
                       placeholder="Your new email">
                @error('email')
                <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
                @enderror

                <div class="flex justify-between">
                    <button type="submit" class="bg-yellow-800 text-white px-4 py-2 rounded hover:bg-yellow-700">Save</button>
                    <button type="button" @click="section = 'none'" class="text-sm text-gray-500 hover:underline">Cancel</button>
                </div>
            </form>
        </div>

        {{-- Password Form --}}
        <div x-show="section === 'password'" class="bg-white shadow rounded-lg p-6" x-transition>
            <h2 class="text-lg font-semibold mb-4 text-gray-700">Change Password</h2>
            <form method="POST" action="{{ route('profile.update.password') }}">
                @csrf
                @method('PUT')

                <input type="password" name="password" placeholder="New Password"
                       class="w-full px-4 py-2 border rounded mb-2 focus:outline-none focus:ring focus:border-yellow-400">
                <input type="password" name="password_confirmation" placeholder="Confirm New Password"
                       class="w-full px-4 py-2 border rounded mb-4 focus:outline-none focus:ring focus:border-yellow-400">

                @error('password')
                <p class="text-red-600 text-sm mb-2">{{ $message }}</p>
                @enderror

                <div class="flex justify-between">
                    <button type="submit" class="bg-yellow-800 text-white px-4 py-2 rounded hover:bg-yellow-700">Update</button>
                    <button type="button" @click="section = 'none'" class="text-sm text-gray-500 hover:underline">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
