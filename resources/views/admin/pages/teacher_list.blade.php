@extends('admin.layout.default')
@section('abc')


    
<div class="container">
        <h2>Teacher List</h2>
        @if(Session::has('msg'))
        <div class="alert alert-danger">
      <strong>{{ Session::get('msg')}}</strong>
      </div>
      @if(Session::has('dlt'))
        <div class="alert alert-danger">
      <strong>{{ Session::get('dlt')}}</strong>
      </div>
    @endif
    @endif
        
       
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Teacher Id</th>
                    <th>Email</th>
                    <th>DATE of Joining</th>
                    <th>Actions</th>
                   
                   
                </tr>
            </thead>
            <tbody>
                
                    @foreach($teacher as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->name}}</td>
                            <td>{{ $c->teacher_id}}</td>
                            <td>{{ $c->email}}</td>
                            <td>{{ $c->created_at}}</td>
                            <td>
                                <!-- <a href="{{ url('edit-course/'.$c->id) }}" class="btn btn-warning btn-sm">Edit</a> -->
                                <a href="{{ url('/delete/'.$c->id)}}"class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                
            </tbody>
        </table>
        <br>
        <div class="row"><center> {{$teacher->links()}}</center></div>
        <br>

       
    </div>
    <style>
       body {
                      /* background-color:  rgb(152, 227, 227)!important;
                      background-repeat: no-repeat;
                      background-attachment: fixed;
                      background-size: 100% 100%;
                          } */
                          th{
                            text-align: center;
                          }
                          td{
                            text-align: center;
                          }
    </style>



        


@stop