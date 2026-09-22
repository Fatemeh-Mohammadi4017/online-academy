<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CoursePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Course $course): bool
    {
        return ($user->role==='teacher' && $user->id===$course->teacher_id)||($user->role==='student' && $user->coursesAsStudent->pluck('id')->contains($course->id));

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
{
    return $user->role === 'teacher';
}

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Course $course): bool
{
    return $user->role === 'teacher'
        && $user->id === $course->teacher_id;
}

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Course $course): bool
{
    return $user->role === 'teacher'
        && $user->id === $course->teacher_id;
}

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Course $course): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Course $course): bool
    {
        return false;
    }
    public function unenroll(User $user, Course $course, User $student): bool
{
    return $user->id === $student->id;
}
public function viewEnrolments(User $user): bool
{
    return $user->coursesAsStudent()->exists();
}
}
