@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-4 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold mb-6">List Users</h1>
    @if ($users->isEmpty())
        <p class="text-gray-600">There aren't users</p>
    @else
    <a href="{{ route('users.create') }}" class="mt-4 inline-block px-4 py-2 bg-[#6BDD8F] text-white rounded-md shadow-sm hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
        Create New User
    </a>

    @if ($message = Session::get('success'))
        <div class="p-4 my-4 text-sm text-white rounded-lg bg-black">
            <p>{{ $message }}</p>
        </div>
    @endif

        <table class="min-w-full divide-y divide-gray-200 mt-6">
            <thead class="bg-gray-50">
                <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Level</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($users as $user)
                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('users.show', $user->id) }}" class="text-xl font-semibold text-blue-600 hover:underline">
                            {{ $user->user_name }}
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-gray-500">{{ $user->email }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-gray-500">{{ $user->user_level }}</span>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-white mb-5">
        {{ $users->onEachSide(5) }}
        </div>
    @endif
</div>
@endsection