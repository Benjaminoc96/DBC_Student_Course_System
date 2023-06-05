@extends('layouts.main')
@section('content')
<h1>
    COURSES LIST
</h1>
@if(Auth::user()->role !== 'normal')
<a href="{{ route('courses.create') }}" class="btn btn-info btn-lg">ADD COURSE</a>
@endif
<table class="table">
        <thead>
            <tr>
                <th scope="col">Course Name</th>
                <th scope="col">Course Description</th>
                <th scope="col">Course Duration</th>
                <th scope="col">Course ID</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->duration }}</td>
                    <td>{{ $course->courseId }}</td>
                    <td>
                        <a type="button" href="{{ route('courses.show', ['course' => $course->id]) }}"
                            class="btn btn-outline-primary btn-sm">View</a>
                            @if(Auth::user()->role !== 'normal')
                                <a type="button" href="{{ route('courses.edit', ['course' => $course->id]) }}"
                                    class="btn btn-outline-success btn-sm">Edit</a>
                            @endif

                            @if(Auth::user()->role == 'superadmin')
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="deleteCourse(this)">
                                    Delete
                                    <form action="{{ route('courses.destroy', [$course->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $courses->links()}}
    <script>
        function deleteCourse(buttonElement) {
            const confirmed = confirm('Are you sure you want to delete this?');
            if (confirmed) {
                const form = buttonElement.querySelector('form');
                form.submit();
            }
        }
    </script>

@endsection
