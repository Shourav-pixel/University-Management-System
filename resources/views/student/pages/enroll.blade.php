@extends('student.layout.default')

@section('stud')
<br>
<hr>
<br>

<div class="container">

@if(Session::has('msg'))
    <div class="alert alert-success">
        <strong>{{ Session::get('msg') }}</strong>
    </div>
@endif

<form action="{{ url('enroll-store') }}" method="post">
    @csrf

    <div class="form-group">
        <label for="student_id">Your Student ID:</label>
        <input type="number" name="student_id" class="form-control" id="student_id" value="{{ $user['userstudentid'] }}">
    </div>
    <div class="form-group">
        <label for="session">Select Session:</label>
        <select name="session" class="form-control" id="session" style="font-size: 20px;">
            <option value="">Select Session</option>
            @foreach($sessions as $session)
                <option value="{{ $session->id }}" {{ $session->id == old('session') ? 'selected' : '' }}>
                    {{ $session->session }}
                </option>
            @endforeach
        </select>
    </div>
    <hr>
    <h2>Course List</h2>

    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Course Title</th>
                <th>Course Code</th>
                <th>Course Credit</th>
                <th>Course Type</th>
                <th>Semester</th>
                <th>Section</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->course_title }}</td>
                    <td>{{ $course->course_code }}</td>
                    <td>{{ $course->course_credit }}</td>
                    <td>{{ $course->course_type }}</td>
                    <td>{{ $course->semester_id }}</td>
                    <td>
                        <label for="section">Section</label>
                        <select name="sections[]" class="form-control" style="font-size: 20px;">
                            <option value="">Select Section</option>
                            @foreach($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->section }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="course_ids[]" value="{{ $course->id }}">
                    </td>
                    <td>
                        <a href="javascript:void(0);" class="btn btn-primary btn-sm btn-enroll"
                            data-course-id="{{ $course->id }}">Enroll</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Add a hidden input field to store selected course IDs -->
    <input type="hidden" name="selectedCourses" id="selectedCourses">

    <!-- Add a "Save" button to save selected courses -->
    <center>
        <button type="submit" class="btn btn-primary btn-sm" id="saveButton">Save</button>
    </center>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        var selectedCourses = {};

        $('.btn-enroll').click(function () {
            var courseId = $(this).data('course-id');
            var sectionSelect = $(this).closest('tr').find('select[name="sections[]"]');
            var sectionId = sectionSelect.val();

            if (sectionId !== "") {
                if (selectedCourses[sectionId]) {
                    selectedCourses[sectionId].push(courseId);
                } else {
                    selectedCourses[sectionId] = [courseId];
                }

                $(this).text(selectedCourses[sectionId].includes(courseId) ? 'Enrolled' : 'Enroll');
                sectionSelect.val(selectedCourses[sectionId].includes(courseId) ? sectionId : "");
            }

            // Update the hidden input with the selected courses
            $('#selectedCourses').val(JSON.stringify(selectedCourses));
        });
    });
</script>
@stop
