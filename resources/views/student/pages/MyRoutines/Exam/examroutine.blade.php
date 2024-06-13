@extends('student.layout.default')

@section('stud')



<br/>
<br/>
<div class="container">
       <center> <h2>Exam Routine</h2></center>
        @if(Session::has('dlt'))
        <div class="alert alert-danger">
      <strong>{{ Session::get('dlt')}}</strong>
      </div>
    @endif
    
       
        <table class="table table-bordered table-striped table-hover">
            <thead>
               
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Course Title</th>
                    <th>Course Code</th>
                    <th>Semester</th>
                    <th>Course Type</th>
                    <th>Room</th>
                 
                    
                   
                </tr>
                
            </thead>
            <tbody>
                
                    @foreach($exam as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->date}}</td>
                            <td>{{ $c->start_time }} - {{ $c->end_time }}</td>
                            <th>{{ $c->course_title }}</th>
                            <th>{{ $c->course_code }}</th>
                            <td>{{ $c->semester }}</td>
                            <td>{{ $c->course_type }}</td>
                            <td>{{ $c->	room }}</td>
                           
                        </tr>
                    @endforeach
                
            </tbody>
        </table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@stop