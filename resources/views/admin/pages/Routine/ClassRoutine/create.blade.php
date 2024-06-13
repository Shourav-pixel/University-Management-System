@extends('admin.layout.default')
@section('abc')
<br>
<br>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<div class="container">
  <h2>Create Routine</h2>

  @if(Session::has('msg'))
        <div class="alert alert-success">
      <strong>{{ Session::get('msg')}}</strong>
      </div>
    @endif

  <form method="post" action="{{ url('routine-store') }}">
  {{ csrf_field() }}
  <div class="card">
    <div class="card-header">Class Timetable</div>
    <div class="card-body">
    
      
        <div class="form-row">
        <div class="col-md-3">
            <label for="">Select Session:</label>
            <select name="session" class="form-control" id="session" style="font-size: 20px;">
              <option value="">Select Session</option>
              @foreach($session as $session)
                        <option value="{{ $session -> id}}">{{$session->session}}</option>
                    @endforeach
          </select>
          </div>

          <div class="col-md-3">
            <label for="">Select Semester:</label>
            <select name="semester" class="form-control getSemester" id="semester" style="font-size: 20px;">
              <option value="">Select Semster</option>
              @foreach($semester as $s)
                        <option value="{{ $s -> id}}">{{$s->semester}}</option>
                    @endforeach
          </select>
          </div>
          <div class="col-md-3">
            <label for="">Select Course:</label>
            <select name="course" class="form-control getCourse" id="course" style="font-size: 20px;">
              <option value="">Select Course</option>
          </select>
          </div>

          <div class="col-md-3">
            <label for="">Select Teacher:</label>
            <select name="teacher" class="form-control getTeacher" id="teacher" style="font-size: 20px;">
              <option value="">Select Teacher</option>
             

          </select>
          </div>
          <div class="col-md-3">
            
            <label for="section">Section</label>
            <select name="section" class="form-control" id="semester" style="font-size: 20px;">
              <option value="">Select Section</option>
              @foreach($section as $sec)
                        <option value="{{ $sec -> id}}">{{$sec->section}}</option>
                    @endforeach
          </select>
          </div>
          
          
        </div>

        <br>
        <hr>


          
    

  <div class="card-body p-0">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Week</th>
          <th>Start Time</th>
          <th>End Time</th>
          <th>Room Number</th>
        </tr>
      </thead>

      <tbody>
        @php
        $i = 1;
        @endphp
        @foreach($day as $d)
        <tr>
         <th>
            <input type="hidden" name="day[{{ $i }}][week_id]" value= "{{ $d->id }}">
            {{ $d->day }}
        </th>
         <td>
         <input type="time" name="day[{{ $i }}][start_time]" class="form-control">
         </td> 
         <td>
          <input type="time" name="day[{{ $i }}][end_time]" class="form-control">
          </td> 
          <td>
            <input type="text" name ="day[{{ $i }}][room]" class="form-control">
            </td> 
        </tr>
        @php
        $i++;
        @endphp
        @endforeach
      </tbody>
    </table>
    <div style = "text-align: center; padding:20px;" >
        <button class = "btn btn-primary">Submit</button>
    </div>
  </div>
</div>


        
        
      </form>
    </div> 
  </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('.getSemester').change(function(){
    var semester_id = $(this).val();
    $.ajax({
        url: "{{ url('get_course') }}",
        type: 'POST',
        data:{
            "_token":"{{ csrf_token() }}",
            semester_id:semester_id,
        },
        dataType:"json",
        success:function(response){
            $('.getCourse').html(response.html)

        },
    });
});

</script>

<script>






$('.getCourse').change(function() {
    var course_id = $(this).val();
    $.ajax({
        url: "{{ url('get_teacher') }}",
        type: 'POST',
        data: {
            "_token": "{{ csrf_token() }}",
            course_id: course_id,
        },
        dataType: "json",
        success: function(response) {
            var select = $('.getTeacher');
            select.empty(); // Clear existing options

            $.each(response.teacherName, function (index, name) {
                select.append('<option value="' + name + '">' + name + '</option>');
            });
        },
    });
});




</script>



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