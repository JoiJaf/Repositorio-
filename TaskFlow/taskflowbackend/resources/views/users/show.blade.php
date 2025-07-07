@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-4 bg-white shadow-md rounded-lg">
    <h1 class="text-4xl font-bold mb-6">{{ $user->user_name }}</h1>
    <div class="flex flex-col lg:flex-row gap-4">
        <div class="lg:w-2/3">
            <div class="mb-4">
                <h2 class="text-2xl font-semibold text-gray-800">General information</h2>
                <ul class="text-gray-700 mt-2">
                    <li><h2>Email:</h2> {{ $user->email }}</li>
                    <li><h2>User Level ID:</h2> {{ $user->user_level_id }}</li>
                </ul>
            </div>
            <div class="mb-4">
                <h2 class="text-2xl font-semibold text-gray-800">Personal Information</h2>
                <ul class="text-gray-700 mt-2">
                    <li><h2>Carnet:</h2> {{ $user->carnet }}</li>
                    <li><h2>Career:</h2> {{ $user->career_name }}</li>
                    <li><h2>Celphone:</h2> {{ $user->celphone }}</li>
                    <li><h2>Status:</h2> {{ $user->status }}</li>
                </ul>
            </div>
            <div class="mt-6 flex space-x-4">
                <a href="{{ route('users.edit', $user->id) }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Edit</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure do you want to delete it?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-block px-4 py-2 bg-red-600 text-white rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button>
                </form>
                <a href="{{ route('users.index') }}" class="inline-block px-4 py-2 bg-gray-600 text-white rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Back to list</a>
            </div>
        </div>
    </div>
</div>
@endsection