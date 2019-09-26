<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Course;
use App\Http\Resources\StudentResource;

class StudentsController extends Controller
{
    function index() {
        return StudentResource::collection(Student::paginate(15));
    }

    function show($id) {
        return new StudentResource(Student::find($id));
    }

    function store(Request $request) {
        $course = Course::where('uuid', $request->course_uuid)->first();

        
        $student = new Student;

        $student->firstName = $request->firstName;
        $student->lastName = $request->lastName;
        $student->year = $request->year;
        $student->course()->associate($course);
        $student->save();

        return new StudentResource($student);
    }
}
