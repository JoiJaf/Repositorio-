<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSpecific extends Model
{
    use HasFactory;

    protected $table = 'users_specific';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'email',
        'user_name',
        'password',
        'user_level_id'
    ];

    public function userLevel()
    {
        return $this->belongsTo(UserLevel::class, 'user_level_id', 'id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'users_courses', 'id', 'course_id');
    }

    /*public function courses()
    {
    return $this->belongsToMany(Course::class, 'users_courses', 'user_specific_id', 'course_id');
    }*/

    public function events()
    {
        return $this->hasMany(Event::class, 'id', 'id');
    }
}