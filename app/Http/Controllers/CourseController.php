<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('courses.list')->with('courses', Course::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=> 'required',
            'duration'=> 'required',
            'courseId'=> 'required'
            ]);
            Course::create($request->only([
               'name',
               'description',
               'duration',
               'courseId'
             ]));
             return redirect(route('courses.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::findOrFail($id);
        return view('courses.show')
        ->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
