<?php

namespace App\Http\Controllers;

use Database\Seeders\UserCourseSeeder;
use Illuminate\Http\Request;

use App\Models\UserCourse;
use App\Models\UserSpecific;
use App\Models\Course;


class UserCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $userCourses = UserCourse::select(
            'user_courses.user_specific_id',
            'user_courses.course_id',
            'user_specifics.name',
            'courses.name as course_name'
        );
        return $userCourses;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $userCourses = UserCourse::select();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
