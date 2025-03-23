@extends('layouts.app')

@section('content')
    {{-- Add x-cloak styling to head --}}
    @push('head')
        <style>[x-cloak] { display: none !important; }</style>
    @endpush

    <div class="max-w-4xl mx-auto p-6" x-data>
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
                <th class="px-4 py-2 text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="border-b">
                    <td class="px-4 py-3">{{ $user->name }}</td>
                    <td class="px-4 py-3">{{ $user->email }}</td>
                    <td class="px-4 py-3 capitalize">{{ $user->role }}</td>
                    <td class="px-4 py-3 text-center" x-data="{ showConfirm: false }">
                        <button @click="showConfirm = true" class="text-red-600 hover:underline">
                            🗑 Delete
                        </button>

                        <!-- Confirm Delete Modal -->
                        <div x-show="showConfirm" x-cloak
                             class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-sm text-center">
                                <h2 class="text-lg font-semibold mb-4 text-gray-800">Delete User</h2>
                                <p class="text-gray-600 mb-6">
                                    Are you sure you want to delete <strong>{{ $user->name }}</strong>?
                                </p>

                                <div class="flex justify-center gap-4">
                                    <button @click="showConfirm = false"
                                            class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                                        Cancel
                                    </button>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                            Confirm Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
