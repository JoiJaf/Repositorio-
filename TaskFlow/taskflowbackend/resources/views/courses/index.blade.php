@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-4 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold mb-6">List Courses</h1>
    @if ($courses->isEmpty())
        <p class="text-gray-600">There aren't courses</p>
    @else
    <a href="{{ route('courses.create') }}" class="mt-4 inline-block px-4 py-2 bg-[#6BDD8F] text-white rounded-md shadow-sm hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
        Create New Course
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
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teacher</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($courses as $course)
                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('courses.show', $course->id) }}" class="text-xl font-semibold text-blue-600 hover:underline">
                            {{ $course->course_name }}
                        </a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-gray-500">{{ $course->teacher }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="text-gray-500">{{ $course->category_name }}</span>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-white mb-5">
        {{ $courses->onEachSide(5) }}
        </div>
    @endif
</div>
@endsection