<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseEvent extends Pivot
{
    use HasFactory;

    protected $table = 'courses_events';
    public $timestamps = false;

    protected $fillable = [
        'course_id',
        'event_id'
    ];
}
