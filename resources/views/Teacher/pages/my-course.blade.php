@extends('Teacher.layouts.default')

@section('teach')

<br/>
<br/>
<div class="container">
        <center><h2>Assigned Courses</h2></center>
        @if(Session::has('dlt'))
        <div class="alert alert-danger">
      <strong>{{ Session::get('dlt')}}</strong>
      </div>
    @endif
        <!-- <a href="{{ url('addcourse') }}"class="btn btn-info" >Create Course</a> -->
       
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course Title</th>
                    <th>Teacher</th>
                    <th>Session</th>
                    <th>Semester</th>
                     <th>Section</th>
                    <th>Action</th>
                   
                </tr>
            </thead>
            <tbody>
                
                    @foreach($assigned as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->course_title}}</td>
                            <td>{{ $c->name}}</td>
                            <td>{{ $c->session}}</td>
                            <td>{{ $c->semester}}</td>
                            <td>{{ $c->section}}</td>
                            <td>
                      
                                <a href="{{ url('mystudent/'.$c->course_id) }}" class="btn btn-primary btn-sm">My Students</a>
                                
                            </td>
                        </tr>
                    @endforeach
                
            </tbody>
        </table>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@stop