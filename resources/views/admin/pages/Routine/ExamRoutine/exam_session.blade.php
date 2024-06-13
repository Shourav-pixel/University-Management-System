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
    <label for="">Select Exam Type</label>
    <select name="type" id="type" class="form-control">
        <option value="">Select Exam Type</option>
        @foreach($type as $e)
        <option value="{{$e->id}}">{{$e->type}}</option>
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
        var typeSelect = document.getElementById('type');

        var selectedSession = sessionSelect.value;
        var selectedType = typeSelect.value;

        if (selectedSession && selectedType) {
            var url = "{{ url('exam-routine/:session/:type') }}";
            url = url.replace(':session', selectedSession);
            url = url.replace(':type', selectedType);

            // Redirect to the dynamically constructed URL
            window.location.href = url;
        } else {
            // Handle the case where the user hasn't selected both session and type
            alert('Please select both session and exam type');
        }
    });
</script>





@stop