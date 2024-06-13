@extends('Teacher.layouts.default')

@section('teach')


<div class="container-fluid">
    <center><h3>Edit Profile</h3></center>
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
            <label for="course_title">Teacher Name:</label>
            <input type="text" name="teacher_name" class="form-control" id="course_title" value="{{ $teachers->name }}"style="font-size: 22px;">
        </div>
        <div class="form-group">
            <label for="course_code">Teacher ID:</label>
            <input type="text" name="teacher_id" class="form-control" id="teacher_id" value="{{ $teachers->teacher_id }}" style="font-size: 22px;">
        </div>
        <div class="form-group">
            <label for="course_code">Acro Name:</label>
            <input type="text" name="acro_name" class="form-control" id="acroname" value="{{ $teachers->acro_name }}" style="font-size: 22px;">
        </div>
        <div class="form-group">
            <label for="course_credit">Email:</label>
            <input type="text" name="email" class="form-control" value="{{ $teachers->email}}" id="email" style="font-size: 22px;">
        </div>
        <div class="form-group">
            <label for="course_credit">Designation:</label>
            <input type="text" name="designation" class="form-control" value="{{ $teachers->designation}}" id="email" style="font-size: 22px;">
        </div>
        <div class="form-group">
            <label for="course_credit">Phone Number:</label>
            <input type="num" name="number" class="form-control" value="{{ $teachers->phone_number}}" id="phone_number" style="font-size: 22px;">
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