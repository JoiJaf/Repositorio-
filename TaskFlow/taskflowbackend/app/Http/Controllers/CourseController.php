<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Category;
use App\Models\UserCourse;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::select(

            'courses.id',
            'courses.course_name',
            'courses.teacher',
            'categories.category_name as category_name'

        )->join('categories', 'courses.category_id', '=', 'categories.id')
        ->orderBy('courses.created_at', 'asc')
        ->paginate(10);

        $total = count(Course::all());

        return view('courses.index', compact('courses', 'total'));

    }

    public function listCourses($id)
    {

        $userCourses = UserCourse::where('user_specific_id', $id)->pluck('course_id');
        $courses = Course::whereIn('id', $userCourses)->get();

        return $courses;

    }

    public function specificCourse($id)
    {
        $courses = Course::where('id', $id)->get();
        return $courses;
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'courseName' => 'required',
            'teacherName' => 'required',
            'category' => 'required'
        ]);
    
        $courseData = [
            'category_id' => $validatedData['category'],
            'course_name' => $validatedData['courseName'],
            'teacher' => $validatedData['teacherName']
        ];

        $course = Course::create($courseData);
    
        return redirect()->route('courses.index')->with('success', 'Course created successfully!');
    }

    public function edit(String $id)
    {

        $course = Course::find($id);

        return view('courses.edit', compact('course'));
    }

    public function show(string $id){
        
        $course = Course::findOrFail($id);
        return view('courses.show', compact('course'));
    }

    public function update(Request $request, string $id)
    {

        $course = Course::find($id);

        if (!$course) {
            return redirect()->route('courses.index')->with('error', 'Course not found.');
        }
        
        $validatedData = $request->validate([
            'courseName' => 'required',
            'teacherName' => 'required',
            'category' => 'required'
        ]);

        $courseData = [
            'category_id' => $validatedData['category'],
            'course_name' => $validatedData['courseName'],
            'teacher' => $validatedData['teacherName']
        ];

        $course->update($courseData);

        return redirect()->route('courses.index', $course)->with('success', 'Course updated successfully!');
    }

    public function destroy(string $id)
    {

        $course = Course::find($id);
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted successfully!');
    }

}
