<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="{{route('students.index')}}" class="nav-link px-2 link-secondary">Students</a></li>
        <li><a href="{{route('courses.index')}}" class="nav-link px-2 link-dark">Courses</a></li>
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="nav-link" type="submit">Logout</button>
            </form>
        </li>

      </ul>

    </header>
</div>
