<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
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
        return new StudentResource(Student::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'year' => $request->year,
        ]));
    }
}
