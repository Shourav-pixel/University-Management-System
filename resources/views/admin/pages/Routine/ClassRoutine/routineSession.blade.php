@extends('admin.layout.default')
@section('abc')


<div class="container-fluid">
    <center><h3>Session</h3></center>
<div class="form-group">
    <label for="">Select Session</label>
    <select name="session" id="session" class="form-control">
        <option value="">Select Session</option>
        @foreach($session as $t)
        <option value="{{$t->id}}">{{$t->session}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="">Select Semester</label>
    <select name="semester" id="semester" class="form-control">
        <option value="">Select Semester</option>
        @foreach($type as $e)
        <option value="{{$e->id}}">{{$e->semester}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="">Select Section</label>
    <select name="section" id="section" class="form-control">
        <option value="">Select Section</option>
        @foreach($section as $sec)
        <option value="{{$sec->id}}">{{$sec->section}}</option>
        @endforeach
    </select>
</div>
<br>
<br>
<div class="form-group">
   <center> <button id="showRoutineBtn" class="btn btn-primary btn-sm">Show Routine</button></center>
</div>
</div>

<style>
    .container-fluid {
    max-width: 800px; /* Adjust the width as needed */
    margin: 0 auto; /* Center the container horizontally */
    padding: 20px; /* Add padding to the container */
    background-color: rgba(255, 255, 255, 0.9); /* Optional background color */
}

label {
        font-size: 18px; /* Adjust the font size as needed */
    }

</style>

<script>
    document.getElementById('showRoutineBtn').addEventListener('click', function() {
        var sessionSelect = document.getElementById('session');
        var typeSelect = document.getElementById('semester');
        var sectionSelect = document.getElementById('section');

        var selectedSession = sessionSelect.value;
        var selectedType = typeSelect.value; 
        var selectedSection = sectionSelect.value;

        if (selectedSession && selectedType && selectedSection) {
            var url = "{{ url('class-routine/:session/:semester/:section') }}";
            url = url.replace(':session', selectedSession);
            url = url.replace(':semester', selectedType);
            url = url.replace(':section', selectedSection);

            // Redirect to the dynamically constructed URL
            window.location.href = url;
        } else {
            // Handle the case where the user hasn't selected both session and type
            alert('Please select both session and Semester');
        }
    });
</script>





@stop