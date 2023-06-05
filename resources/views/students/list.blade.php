@extends('layouts.main')
@section('content')
<h1>
    STUDENTS LIST
</h1>
@if(Auth::user()->role !== 'normal')
<a href="{{ route('students.create') }}" class="btn btn-info btn-lg">ADD STUDENT</a>
@endif
<table class="table">
        <thead>
            <tr>
                <th scope="col">Student Name</th>
                <th scope="col">Student ID</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->studentId }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>
                        <a type="button" href="{{ route('students.show', ['student' => $student->id]) }}"
                            class="btn btn-outline-primary btn-sm">View</a>
                            @if(Auth::user()->role !== 'normal')
                                <a type="button" href="{{ route('students.edit', ['student' => $student->id]) }}"
                                    class="btn btn-outline-success btn-sm">Edit</a>
                            @endif

                            @if(Auth::user()->role == 'superadmin')
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="deleteStudent(this)">
                                    Delete
                                    <form action="{{ route('students.destroy', [$student->id]) }}" method="POST">
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
    {{ $students->links()}}
    <script>
        function deleteStudent(buttonElement) {
            const confirmed = confirm('Are you sure you want to delete this?');
            if (confirmed) {
                const form = buttonElement.querySelector('form');
                form.submit();
            }
        }
    </script>

@endsection
