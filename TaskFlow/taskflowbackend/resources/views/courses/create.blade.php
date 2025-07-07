@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md mt-10">
        <h1 class="text-2xl font-bold mb-6">Create Course</h1>

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

        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

        <div>
            <label for="courseName" class="block text-sm font-medium text-gray-700">Course:</label>
            <input type="text" id="courseName" name="courseName" placeholder="Course Name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="teacherName" class="block text-sm font-medium text-gray-700">Teacher:</label>
            <input type="text" id="teacherName" name="teacherName" placeholder="Teacher Name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        </div>

        <div>
            <label for="category" class="block text-sm font-medium text-gray-700" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">Category:</label>
                <select name="category" id="category">
                    <option value="1">Career</option>
                    <option value="2">Course</option>
                    <option value="3">University</option>
                    <option value="4">Student</option>
                </select>
        </div>       

            <button type="submit" class="w-full bg-[#6BDD8F] text-white py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-700">
                Create
            </button>
        </form>
        <br>
        <a href="{{ route('courses.index') }}" class="text-black hover:text-green-500">Back</a>
    </div>
@endsection