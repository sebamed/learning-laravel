<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;
use App\Http\Resources\CourseResource;

use App\Helpers\ExceptionHelper;

class CoursesController extends Controller
{
    //

    public function __construct(Request $request) {
        $this->_request = $request;
    }

    public function show($uuid) {
        throwException(404, "Testiranje", $this->_request->path());
        return new CourseResource(Course::where(['uuid'=>$uuid])->firstOrFail());
    }

    public function store(Request $request) {
        return new CourseResource(Course::create([
            'name' => $request->name
        ]));
    }
}
