@extends('layouts.main')
@section('content')
<form action="{{route('courses.store') }}" method="POST">
@csrf
@isset($edit)
    @method('PATCH')
@endisset

<div class="col">
        <label for="name" class="form-label">Course Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Type your course name">
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <br>
    <div class="col">
        <label for="description" class="form-label">Course Description</label>
        <input type="text" class="form-control" name="description" id="description" placeholder="Type your course description">
        @error('description')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <br>
    <div class="col">
        <label for="duration" class="form-label">Course Duration</label>
        <input type="text" class="form-control" name="duration" id="duration" placeholder="Type your course duration">
        @error('duration')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <br>
    <div class="col">
        <label for="courseId" class="form-label">Course ID</label>
        <input type="text" class="form-control" name="courseId" id="courseId" placeholder="Type your course ID">
        @error('courseId')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <br>
    <div class="mt-3">
        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
    </div>
</form>
@endsection
