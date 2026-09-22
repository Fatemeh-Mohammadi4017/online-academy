<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use App\Models\Lesson;
use App\Models\User;
#[Fillable([
    'teacher_id',
    'name',
    'is_published',
    'duration',
    'price',
    'description'
])]

class Course extends Model
{
    public function teacher(){
        return $this ->belongsTo(User::class,'teacher_id');
    }
    public function lessons(){
        return $this ->hasMany(Lesson::class);
    }
     public function students(){
         return $this ->belongsToMany(User::class, 'course_student','course_id','student_id');
     }
}
