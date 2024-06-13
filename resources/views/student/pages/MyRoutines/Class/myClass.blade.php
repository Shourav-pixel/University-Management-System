@extends('student.layout.default')

@section('stud')
    <br>
    <br>
<center><h3><strong>Class Timetable</strong></h3></center>
    <div class="container">
        @foreach($week as $dayId => $dayData)
            <div class="card">
                <div class="card-header"><strong>{{ $dayData['day_name'] }}</strong></div>
                <hr>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Course Title</th>
                                <th>Course Code</th>
                                <th>Teacher</th>
                                <th>Course Type</th>
                                <th>Room</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dayData['routines'] as $routine)
                                <tr>
                                    <td>{{ $routine['start_time'] }} - {{ $routine['end_time'] }}</td>
                                    <td>{{ $routine['course_title'] }}</td>
                                    <td>{{ $routine['course_code'] }}</td>
                                    <td>{{ $routine['teacher_name'] }}</td>
                                    <td>{{ $routine['course_type'] }}</td>
                                    <td>{{ $routine['room'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
    <br>
    <br>
@stop
