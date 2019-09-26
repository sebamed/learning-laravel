<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\Http\Resources\CourseResource;

class CoursesController extends Controller
{
    //

    public function store(Request $request) {
        return new CourseResource(Course::create([
            'name' => $request->name
        ]));
    }
}
