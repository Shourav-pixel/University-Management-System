@extends('Teacher.layouts.default')

@section('teach')


    
<div class="container">
        <h2>My Students</h2>
        @if(Session::has('msg'))
        <div class="alert alert-danger">
      <strong>{{ Session::get('msg')}}</strong>
      </div>
    @endif
        
       
        <table class="table table-bordered table-striped table-hover">
            <thead>
               
               <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Student Id</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                   
                   
                </tr>
           
            </thead>
            <tbody>
                
            @foreach($result as $c)
                        <tr>
                            <td>{{ $c->id }}</td>
                            <td>{{ $c->name}}</td>
                            <td>{{ $c->student_id }}</td>

                            <td>{{ $c->email}}</td>
                            <td>{{ $c->phone_number}}</td>
                          
                        </tr>
                    @endforeach

            </tbody>
        </table>
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