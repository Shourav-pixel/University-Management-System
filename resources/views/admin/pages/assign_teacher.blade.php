@extends('admin.layout.default')
@section('abc')
<br>
<br>


<div class="container-fluid">
    <center><h3>Assign Teacher </h3></center>
            @if(Session::has('msg'))
            <div class="alert alert-success">
 Successfully Assigned!!
  
</div>


            @endif


        <style>
.alert-success {
  background-color: #4CAF50; /* Green background color */
  color: white;              /* Text color */
  padding: 15px;             /* Padding inside the alert */
  border-radius: 5px;        /* Rounded corners */
  margin-bottom: 15px;      /* Spacing between alerts */
}




        </style>





    <form method="post" action="{{ url('assign-teacherstore') }}">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="tid">Select Course</label>
            <select name="course_id" class="form-control" id="course_type" style="font-size: 20px;">
                <option value="{{ $courses->id }}">{{$courses->course_title}}</option>
                
               
            </select>
        </div>
        <div class="form-group">
            <label for="tid">Select Teacher</label>
            <select name="tid" class="form-control" id="course_type" style="font-size: 20px;">
                <option value="">Select Teacher</option>
                @foreach($teacher as $t)
                <option value="{{ $t->id }}">{{$t->name}}</option>
                
                @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="session_id">Select Session</label>
          <select name="session_id" id="" class="form-control"style="font-size: 20px;">
          <option value="">Select Session</option>
          @foreach($session as $s)
          <option value="{{ $s -> id}}">{{$s->session}}</option>
          @endforeach

        </select>
        </div>

        <div class="form-group">
          <label for="semester_id">Select Semester</label>
          <select name="semester_id" id="" class="form-control"style="font-size: 20px;">
          <option value="">Select Semester</option>
          @foreach($semester as $s)
          <option value="{{ $s -> id}}">{{$s->semester}}</option>
          @endforeach

        </select>
        </div>
        <div class="form-group">
            <label for="section">Select Section</label>
            <select name="section" id="" class="form-control"style="font-size: 20px;">
          <option value="">Select Section</option>
          @foreach($section as $sec)
          <option value="{{ $sec -> id}}">{{$sec->section}}</option>
          @endforeach

        </select>
        </div>


    
        <br>
        <div class="form-group">
            <center><button type="submit" class="btn btn-primary" style="font-size: 22px;">Submit</button></center>
        </div>
        
    </form>
</div>

<style>
    .container-fluid {
    max-width: 800px; /* Adjust the width as needed */
    margin: 0 auto; /* Center the container horizontally */
    padding: 20px; /* Add padding to the container */
    background-color: rgba(255, 255, 255, 0.9); /* Optional background color */
}

label {
        font-size: 18px; 
    }

</style>

@stop
  