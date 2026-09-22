<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Lesson;


class DashboardController extends Controller
{
    
    public function index(){
    $totalUsers = User::count();
    $totalCourses = Course::count();
    $totalLessons = Lesson::count();
    $teachers=User::where('role','teacher')->get();
    $students=User::where('role','student')->get();
        return view('dashboard',compact('totalUsers','totalCourses','totalLessons','teachers','students'));
    }
}
