
<div style="height: 100px;background-color: blue;background-size: cover;padding-top: 25px;">
    <div class="header  d-flex justify-content-center" style="font-weight: bold;">
    <H2 class="text-light ">Northern University Bangladesh</H2>
    </div>
    </div>
</header>
<div class=" justify-content-end">
<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: indigo;">
    <a class="navbar-brand" href="#">Schedule Management System</a>
    <button class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('student-dashboard') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('enrolled-courses') }}">My Courses</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('enroll') }}">Enroll</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('select-session') }}">Class Routine</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('exam-session-student') }}">Exam Routine</a>
            </li>
        </ul>
        
        

        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('slogout') }}">Logout</a>
            </li>
        </ul>
    </div>
</nav>

</div>