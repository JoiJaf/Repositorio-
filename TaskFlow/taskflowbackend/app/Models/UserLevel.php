<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    use HasFactory;

    protected $table = 'users_levels';
    protected $primaryKey = 'user_level_id';
    public $timestamps = false;

    protected $fillable = [
        'user_level_name'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'user_level_id', 'user_level_id');
    }
}
