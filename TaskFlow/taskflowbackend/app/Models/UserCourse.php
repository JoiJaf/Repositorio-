<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserCourse extends Pivot
{
    use HasFactory;

    protected $table = 'users_courses';
    public $timestamps = false;

    protected $fillable = [
        'user_specific_id',
        'course_id'

    ];

}