<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search=$request->search;
        if($search==null){
            $courses=Course::paginate(5);
            return view('courses.index',compact('courses'));
        }
        else{
        $courses=Course::where('name','like','%'.$search.'%')->paginate(5);
        return view('courses.index',compact('courses'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    //    $users= User::where('role','teacher')->get();
        $user=auth()->user();
       return view('courses.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {

        Course::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'teacher_id'=>$request->teacher_id,
            'duration'=>$request->duration,
            'is_published'=>$request->is_published,
            'description'=>$request->description,
        ]);
        return redirect()->route('courses.index')->with('success','دوره با موفقیت ذخیره شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        Gate::authorize('view',$course);
       $lessons= $course->lessons()->get();
       return view('courses.show',compact('lessons','course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, string $id)
    {
    $course=Course::findOrFail($id);
    Gate::authorize('update', $course);
   
        $course->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'duration'=>$request->duration,
            'is_published'=>$request->is_published,
            'description'=>$request->description,
        ]);
        return redirect()->route('courses.index')->with('success','دوره با موفقیت اپدیت شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course=Course::findOrFail($id);
        Gate::authorize('delete',$course);
        $course->delete();
        return redirect()->route('courses.index')->with('success','دوره با موفقیت حذف شد');;
    }
}
