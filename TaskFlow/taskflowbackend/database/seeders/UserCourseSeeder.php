<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\UserCourse;

class UserCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //User ID 1
        UserCourse::create(['user_specific_id' => 1, 'course_id' => 1]);
        UserCourse::create(['user_specific_id' => 1, 'course_id' => 2]);
        //User ID 2
        UserCourse::create(['user_specific_id' => 2, 'course_id' => 3]);
        UserCourse::create(['user_specific_id' => 2, 'course_id' => 4]);
        //User ID 3
        UserCourse::create(['user_specific_id' => 3, 'course_id' => 5]);
        UserCourse::create(['user_specific_id' => 3, 'course_id' => 6]);
        //User ID 4
        UserCourse::create(['user_specific_id' => 4, 'course_id' => 7]);
        UserCourse::create(['user_specific_id' => 4, 'course_id' => 8]);
        //User ID 5
        UserCourse::create(['user_specific_id' => 5, 'course_id' => 9]);
        UserCourse::create(['user_specific_id' => 5, 'course_id' => 10]);
        
    }
}
