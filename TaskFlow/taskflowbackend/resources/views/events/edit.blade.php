@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-4 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold mb-6">Edit Event</h1>

    @if ($errors->any())
        <div class="text-center text-[#f68051]">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="tag_id" class="block text-sm font-medium text-gray-700">Tag ID:</label>
            <input type="text" id="tag_id" name="tag_id" value="{{ $event->tag_id }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="course_id" class="block text-sm font-medium text-gray-700">Course ID:</label>
            <input type="text" id="course_id" name="course_id" value="{{ $event->course_id }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="user_specific_id" class="block text-sm font-medium text-gray-700">User Specific ID:</label>
            <input type="text" id="user_specific_id" name="user_specific_id" value="{{ $event->user_specific_id }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
            <input type="text" id="title" name="title" value="{{ $event->title }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Image:</label>
            <input type="file" id="image" name="image" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @if ($event->image)
                <img src="{{ asset('storage/images/' . $event->image) }}" alt="{{ $event->title }}" class="mt-2 w-32 h-32 rounded-lg">
            @endif
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
            <textarea id="description" name="description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $event->description }}</textarea>
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
            <input type="text" id="status" name="status" value="{{ $event->status }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="finish_date" class="block text-sm font-medium text-gray-700">Delivery Date:</label>
            <input type="text" id="finish_date" name="finish_date" value="{{ $event->finish_date }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Update
        </button>
    </form>
    <br>
    <a href="{{ route('events.index') }}" class="text-black hover:text-green-500">Back</a>
</div>
@endsection
