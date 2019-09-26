<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\Http\Resources\CourseResource;

use App\Helpers\ExceptionHelper;

class CoursesController extends Controller
{
    //

    public function show(Request $request, $uuid) {
        throwException(404, "Testiranje", $request->path());
        return new CourseResource(Course::where(['uuid'=>$uuid])->firstOrFail());
    }

    public function store(Request $request) {
        return new CourseResource(Course::create([
            'name' => $request->name
        ]));
    }
}
