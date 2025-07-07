<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'tag_id',
        'course_id',
        'user_specific_id',
        'title',
        'image',
        'description',
        'finish_date',
        'status'
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id', 'tag_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_specific_id', 'user_specific_id');
    }
}
