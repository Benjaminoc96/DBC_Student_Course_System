@extends('layouts.main')
@section('content')
<h1>Course Details</h1>
<ul class="list-group">
    <li class="list-group-item">Course Name : {{$course->name}}</li>
</ul>

<hr>

<h3>Students</h3>
<ul class="list-group">
    @forelse ($course->students as $student)
        <li class="list-group-item font-bold">{{$student->firstname}} {{$student->lastname}} </li>
    @empty
        <li class="list-group-item">No registered students</li>
    @endforelse
</ul>
@endsection
