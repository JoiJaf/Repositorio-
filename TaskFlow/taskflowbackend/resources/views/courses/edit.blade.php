@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-4 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold mb-6">Edit Course</h1>

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

    <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="teacherName" class="block text-sm font-medium text-gray-700">Teacher:</label>
            <input type="text" id="teacherName" name="teacherName" value="{{ $course->teacher }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="category" class="block text-sm font-medium text-gray-700" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">Category:</label>
                <select name="category" id="category">
                    <option value="1" {{ $course->category_id == 1 ? 'selected' : '' }}>Career</option>
                    <option value="2" {{ $course->category_id == 2 ? 'selected' : '' }}>Course</option>
                    <option value="3" {{ $course->category_id == 3 ? 'selected' : '' }}>University</option>
                    <option value="4" {{ $course->category_id == 4 ? 'selected' : '' }}>Student</option>
            </select>
        </div>       

        <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Update
        </button>
    </form>
    <br>
    <a href="{{ route('courses.index') }}" class="text-black hover:text-green-500">Back</a>
</div>
@endsection
