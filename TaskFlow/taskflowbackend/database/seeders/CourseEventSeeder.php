<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\CourseEvent;

class CourseEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //ID course 1 
        CourseEvent::create(['id'=> 1,'course_id'=> 1,'event_id'=> 1]);
        CourseEvent::create(['id'=> 2,'course_id'=> 1,'event_id'=> 2]); 
        //ID course 2
        CourseEvent::create(['id'=> 3,'course_id'=> 2,'event_id'=> 3]);
        CourseEvent::create(['id'=> 4,'course_id'=> 2,'event_id'=> 4]);
        //ID course 3
        CourseEvent::create(['id'=> 5,'course_id'=> 3,'event_id'=> 5]);
        CourseEvent::create(['id'=> 6,'course_id'=> 3,'event_id'=> 9]);
        //ID course 4
        CourseEvent::create(['id'=> 7,'course_id'=> 4,'event_id'=> 7]);
        CourseEvent::create(['id'=> 8,'course_id'=> 4,'event_id'=> 10]);
        //ID course 5
        CourseEvent::create(['id'=> 9,'course_id'=> 5,'event_id'=> 6]);
        CourseEvent::create(['id'=> 10,'course_id'=> 5,'event_id'=> 11]);
        //ID course 6
        CourseEvent::create(['id'=> 11,'course_id'=> 6,'event_id'=> 12]);
        CourseEvent::create(['id'=> 12,'course_id'=> 6,'event_id'=> 13]);
        //ID course 7
        CourseEvent::create(['id'=> 13,'course_id'=> 7,'event_id'=> 14]);
        CourseEvent::create(['id'=> 14,'course_id'=> 7,'event_id'=> 15]);
        //ID course 8
        CourseEvent::create(['id'=> 15,'course_id'=> 8,'event_id'=> 8]);
        CourseEvent::create(['id'=> 16,'course_id'=> 8,'event_id'=> 16]);
        //ID course 9
        CourseEvent::create(['id'=> 17,'course_id'=> 9,'event_id'=> 17]);
        CourseEvent::create(['id'=> 18,'course_id'=> 9,'event_id'=> 18]);
        //ID course 10
        CourseEvent::create(['id'=> 19,'course_id'=> 10,'event_id'=> 19]);
        CourseEvent::create(['id'=> 20,'course_id'=> 10,'event_id'=> 20]);
    }
}
