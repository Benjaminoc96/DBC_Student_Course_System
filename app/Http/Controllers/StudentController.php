<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('students.list',['students'=>Student::paginate(1)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.form')->with('courses', Course::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'studentId'=>'required',
            'gender'=>'required',
            'dob'=>'required',
            'email'=>'required',
            'course_id'=>'required'
        ]);
        Student::create($request->only([
            'name',
            'studentId',
            'gender',
            'dob',
            'email',
            'course_id'
        ]));
        return redirect(route('students.index'))->with('notification', 'Student Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student=Student::findOrFail($id);
        return view('students.show', ['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
