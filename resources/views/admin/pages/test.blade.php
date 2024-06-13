@extends('admin.layout.default')
@section('abc')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
@if(Session::has('msg'))
      <div class="alert alert-success">
      <strong>{{ Session::get('msg')}}</strong>
      </div>
    @endif  
    <style>
        .mul-select{
            width: 100%;
        }
    </style>
<div class="container">
        <h3>Assign Teacher</h3>
        <form enctype="multipart/form-data" method ="post"action="{{ url('store-assign') }}">
            {{ csrf_field() }}
            <div class="form-group">
                  <label for="">Select Teacher Id</label>
                    <select name="teacher_id" id="division"class="form-control">Teacher Id
                    <option value="">Select ID</option>
                    @foreach($teacher as $t)
                    <option value="{{$t->id}}">{{$t->teacher_id}}</option>
                    @endforeach
                    </select>
              </div>
            
               
                <!-- for course selection -->
                <div class="form-group">
                  <label for="">Select Session</label>
                    <select name="session" id="division"class="form-control">Session
                    <option value="">Select Session</option>
                    @foreach($session as $s)
                    <option value="{{$s->id}}">{{$s->session}}</option>
                    @endforeach
                    </select>
              </div>
              <div class="form-group">
                  <label for="">Select Semester</label>
                    <select name="semester" id="semester"class="form-control">Semester
                    <option value="">Select Semester</option>
                    @foreach($semester as $sem)
                    <option value="{{$sem->id}}">{{$sem->semester}}</option>
                    @endforeach
                    </select>
              </div>
             
          
              
               
           
               
                <div class="form-group">
                            <button type="submit"class="btn btn-primary">Save</button>
                        </div>
              </div>

         
         
                <div>
                  
            
                       
                    </form>
                </div>
                </div>
                <style>
                   /* body  {
                      background-color:  rgb(152, 227, 227)!important;
                      background-repeat: no-repeat;
                      background-attachment: fixed;
                      background-size: 100% 100%;
                          } */

                </style>
                
          <script>
              $(document).ready(function(){
                $(".mul-select").select2({
                        placeholder: "Select Course Title", //placeholder
                        tags: true,
                        tokenSeparators: ['/',',',';'," "] 
                    });
                })
        </script>
@stop