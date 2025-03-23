@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">User Management</h1>

        @if(session('success'))
            <p class="text-green-700 mb-4">{{ session('success') }}</p>
        @endif

        @if(session('error'))
            <p class="text-red-700 mb-4">{{ session('error') }}</p>
        @endif

        <table class="w-full table-auto bg-white rounded shadow overflow-hidden">
            <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-left">Name</th>
                <th class="px-4 py-2 text-left">Email</th>
                <th class="px-4 py-2 text-left">Role</th>
                <th class="px-4 py-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="border-b">
                    <td class="px-4 py-3">{{ $user->name }}</td>
                    <td class="px-4 py-3">{{ $user->email }}</td>
                    <td class="px-4 py-3 capitalize">{{ $user->role }}</td>
                    <td class="px-4 py-3 text-center">
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Delete this user?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">🗑 Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
