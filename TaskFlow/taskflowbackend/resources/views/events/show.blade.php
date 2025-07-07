@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-4 bg-white shadow-md rounded-lg">
    <h1 class="text-4xl font-bold mb-6">{{ $event->title }}</h1>
    <div class="flex flex-col lg:flex-row gap-4">
        <div class="lg:w-1/3">
            @isset($event->image)
                <img src="{{ asset($event->image) }}" alt="{{ $event->title }}" class="w-full h-auto rounded-lg">
            @else
                <img src="https://via.placeholder.com/150" alt="No image available" class="w-full h-auto rounded-lg">
            @endisset
        </div>
        <div class="lg:w-2/3">
            <div class="mb-4">
                <h2 class="text-2xl font-semibold text-gray-800">Description</h2>
                <p class="text-gray-700 mt-2">{{ $event->description }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-2xl font-semibold text-gray-800">Event's details</h2>
                <ul class="text-gray-700 mt-2">
                    <li><h2>Tag ID:</h2> {{ $event->tag_id }}</li>
                    <li><h2>Course ID:</h2> {{ $event->course_id }}</li>
                    <li><h2>User Specific ID:</h2> {{ $event->user_specific_id }}</li>
                    <li><h2>Status:</h2> {{ $event->status }}</li>
                    <li><h2>Fecha de Finalización:</h2> {{ \Carbon\Carbon::parse($event->finish_date)->format('d/m/Y') }}</li>
                </ul>
            </div>
            <div class="mt-6 flex space-x-4">
                <a href="{{ route('events.edit', $event->id) }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Edit</a>
                <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure do you want to delete it?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-block px-4 py-2 bg-red-600 text-white rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button>
                </form>
                <a href="{{ route('events.index') }}" class="inline-block px-4 py-2 bg-gray-600 text-white rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Back to list</a>
            </div>
        </div>
    </div>
</div>
@endsection