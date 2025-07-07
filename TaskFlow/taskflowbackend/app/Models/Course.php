<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'category_id',
        'course_name',
        'teacher'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_courses', 'id', 'user_specific_id');
    }

    /*public function users()
    {
    return $this->belongsToMany(UserSpecific::class, 'users_courses', 'course_id', 'user_specific_id');
    }*/
    
    public function events()
    {
        return $this->belongsToMany(Event::class, 'courses_events', 'id', 'event_id');
    }

}