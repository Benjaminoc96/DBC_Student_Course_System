@extends('layouts.main')
@section('content')
<form action="{{route('students.store') }}" method="POST">
@csrf
<div class="row mb-3">
    <div class="col">
        <label for="name" class="form-label">Student Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Type your student name">
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col">
        <label for="studentId" class="form-label">Student ID</label>
        <input type="text" class="form-control" name="studentId" id="studentId" placeholder="Type your studentId">
        @error('studentId')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" id="email" placeholder="Type your student email">
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mt-3">
        <label class="form-label">Select Gender</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
            <label class="form-check-label" for="male">
                Male
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
            <label class="form-check-label" for="female">
                Female
            </label>
    </div>
    <br>
    <div class="col">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" name="dob" placeholder="Date of Birth">
        @error('dob')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mt-3">
        <label for="course_id" class="form-label">Course</label>
        <select class="form-control" name="course_id" id="course_id">
            @foreach ($courses as $course)
            <option value="{{$course->id}}">{{$course->name}}</option>
            @endforeach
        </select>
        @error('course_id')
        <span class="error">{{$message}}</span>
        @enderror
    </div>
    <br>
</div>

    <div class="mt-3">
        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
    </div>
</form>

@endsection
