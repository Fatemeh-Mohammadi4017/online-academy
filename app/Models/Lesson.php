<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use App\Models\Course;
use App\Models\User;
#[Fillable([
    'course_id',
    'topic',
    'description',
    'duration'
])]
class Lesson extends Model
{
    public function course(){
        return $this ->belongsTo(Course::class);
    }
     public function students(){
         return $this ->belongsToMany(User::class);
     }
}
