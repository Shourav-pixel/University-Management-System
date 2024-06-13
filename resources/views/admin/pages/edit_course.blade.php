@extends('admin.layout.default')
@section('abc')
<br>
<br>


<div class="container-fluid">
    <center><h3>Edit Course</h3></center>
            @if(Session::has('msg'))
            <div class="alert alert-success">
  This is a success alert message.
  
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





    <form method="post" action="{{ url('update-course/'.$courses->id)   }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="course_title">Course Title:</label>
            <input type="text" name="course_title" class="form-control" id="course_title" value="{{ $courses->course_title }}"style="font-size: 22px;">
        </div>
        <div class="form-group">
            <label for="course_code">Course Code:</label>
            <input type="text" name="course_code" class="form-control" id="course_code" value="{{ $courses->course_code }}" style="font-size: 22px;">
        </div>
        <div class="form-group">
            <label for="course_code">Course AcroName:</label>
            <input type="text" name="acro_name" class="form-control" id="course_code" value="{{ $courses->course_acroname }}" style="font-size: 22px;">
        </div>
        <div class="form-group">
            <label for="course_credit">Credit:</label>
            <input type="text" name="course_credit" class="form-control" value="{{ $courses->course_credit}}" id="course_credit" style="font-size: 22px;">
        </div>
        <div class="form-group">
            <label for="course_type">Course Type</label>
            <select name="course_type" class="form-control" id="course_type" style="font-size: 20px;">
                <option value="">Select Type</option>
                <option value="Lab">LAB</option>
                <option value="Theory">Theory</option>
            </select>
        </div>

        <div class="form-group">
            <label for="course_credit">Semester:</label>
            <input type="text" name="semester" class="form-control" value="{{ $courses->semester_id}}" id="course_credit" style="font-size: 22px;">
        </div>
        <br>
        <div class="form-group">
            <center><button type="submit" class="btn btn-primary" style="font-size: 22px;">Update</button></center>
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
  