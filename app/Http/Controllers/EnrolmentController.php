<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
class EnrolmentController extends Controller
{
    public function index(Request $request){
        $student=$request->user();
        $courses=$student->coursesAsStudent;
         return view('enrolment.index',compact('courses','student'));
    }
    public function create(Request $request){
         $courses=Course::all();
         $student=$request->user();
        return view('enrolment.create',compact('student','courses'));
    }
    public function store(Request $request){
         $course=Course::findOrFail($request->course_id);
         $student=$request->user();
         $course->students()->attach($student->id);
         return redirect()->route('enrolments.create');
    }
    public function destroy(Course $course,User $student){
        Gate::authorize('unenroll',[$course,$student]);
        $course->students()->detach($student->id);
        return redirect()->route('enrolments.index');

    }
}
