<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons=Lesson::all();
        return view('lessons.index',compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        return view('lessons.create',compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create',Lesson::class);
        Lesson::create([
            'course_id'=>$request->course_id,
            'topic'=>$request->topic,
            'description'=>$request->description,
            'duration'=>$request->duration
        ]);
        return Redirect()->route('lessons.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        Gate::authorize('update', $lesson);
        return view('lessons.edit',compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lesson=Lesson::findOrFail($id);
        Gate::authorize('update', $lesson);
        $lesson->update([
            'course_id'=>$request->course_id,
            'topic'=>$request->topic,
            'description'=>$request->description,
            'duration'=>$request->duration
        ]);
        return Redirect()->route('lessons.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        Gate::authorize('delete',$lesson);
        $lesson->delete();
    return redirect()->route('lessons.index');
    }
}
