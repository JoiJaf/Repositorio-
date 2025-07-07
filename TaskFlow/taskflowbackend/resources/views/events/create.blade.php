@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
        <h1 class="text-2xl font-bold mb-6">Create Event</h1>

        @if ($errors->any())
        <div class="text-center text-green-700">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label for="tag_id" class="block text-sm font-medium text-gray-700">Tag ID:</label>
                <input type="text" id="tag_id" name="tag_id" class="mt-1 block w-full border border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="course_id" class="block text-sm font-medium text-gray-700">Course ID:</label>
                <input type="text" id="course_id" name="course_id" class="mt-1 block w-full border border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="user_specific_id" class="block text-sm font-medium text-gray-700">User Specific ID:</label>
                <input type="text" id="user_specific_id" name="user_specific_id" class="mt-1 block w-fullborder border border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                <input type="text" id="title" name="title" class="mt-1 block w-full border border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Image:</label>
                <input type="file" id="image" name="image" class="mt-1 block w-full border  rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea id="description" name="description" class="mt-1 block w-full border border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
                <input type="text" id="status" name="status" class="mt-1 block w-full border border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div>
                <label for="finish_date" class="block text-sm font-medium text-gray-700">Delivery date:</label>
                <input type="text" id="finish_date" name="finish_date" class="mt-1 block w-full border border-black rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <button type="submit" class="w-full bg-[#6BDD8F] text-white py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-700">
                Create
            </button>
        </form>
        <br>
        <a href="{{ route('events.index') }}" class="text-black hover:text-green-500">Back</a>
    </div>
@endsection