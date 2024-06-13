@extends('student.layout.default')

@section('stud')

<br/>
<br/>
<div class="container">
        <h2>Enrolled Course List</h2>
        @if(Session::has('dlt'))
        <div class="alert alert-danger">
      <strong>{{ Session::get('dlt')}}</strong>
      </div>
    @endif
      
       
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Session</th>
                    <th>Course Title</th>
                    <th>Sections</th>
                   
                   
                </tr>
            </thead>
            <tbody>
                
                    @foreach($courses as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->session}}</td>
                            <td>{{ $c->course_title}}</td>
                        
                            <td>{{ $c->section}}</td>
                          
                        </tr>
                    @endforeach
                
            </tbody>
        </table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@stop