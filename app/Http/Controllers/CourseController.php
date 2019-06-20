<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function get()
    {
        $courses = Course::query()->orderBy('id')->get();

        return response($courses);
    }

    public function show($id)
    {
        return Course::query()->with('disciplines')->find($id);
    }

    public function subscript(Request $request, $id)
    {
        /** @var Course $course */
        $course = Course::query()->find($id);

        $course->users()->attach($request->user()->id);
    }
}
