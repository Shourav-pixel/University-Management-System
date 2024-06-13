@extends('Teacher.layouts.default')

@section('teach')
<div
        id="intro-example"
        class=" background p-5 text-center bg-image"
        style="background-image: url('/img/p1.jpg');background-size: cover"

>
  

    <!-- For Photo -->
    <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body text-center">
                  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSdjiEAGONlEjsXlxaKdAiUM9cZrCbjJRIp2Q&usqp=CAU" alt="avatar"
                    class="rounded-circle img-fluid" style="width: 150px;">
                  <h5 class="my-3">{{ session('username') }}</h5>
                  <p class="text-muted mb-1">Full Stack Developer</p>
                  <p class="text-muted mb-4">Bay Area, San Francisco, CA</p>
                  <div class="d-flex justify-content-center mb-2">
                    <!-- <button type="button" class="btn btn-primary">Follow</button>
                    <button type="button" class="btn btn-outline-primary ms-1">Message</button> -->
                  </div>
                </div>
              </div>
              <div class="card mb-4 mb-lg-0">
                <div class="card-body p-0">
                <!-- new -->
                <ul class="list-group list-group-flush rounded-3">
    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
        <i class="fa fa-github" style="color: #333333;"></i>
        <p class="mb-0"><a href="https://github.com/mdbootstrap" target="_blank">Github</a></p>
    </li>

    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
    <i class="fa fa-linkedin" style="color: #0077B5;"></i>
            <a href="https://www.linkedin.com/company/mdbootstrap" target="_blank">
                
            Linkdin</a>
        </li>
 
    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
        <i class="fa fa-twitter" style="color: #55acee;"></i>
        <p class="mb-0"><a href="https://twitter.com/mdbootstrap" target="_blank">Twitter</a></p>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
        <i class="fab fa-kaggle" style="color: #ac2bac;"></i>
        <p class="mb-0"><a href="https://www.kaggle.com/"target="_blank">Kaggle</a></p>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
        <i class="fa fa-facebook-f " style="color: #3b5998;"></i>
        <p class="mb-0"><a href="https://www.facebook.com/mdbootstrap" target="_blank">Facebook</a></p>
    </li>
  

   


</ul>



                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ session('username') }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Id</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ session('teacherid') }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ session('email') }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Designation</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ session('designation') }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Phone</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ session('phone') }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Mobile</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ session('phone') }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Address</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">Bay Area, San Francisco, CA</p>
                    </div>
                  </div>
                </div>
              </div>

</div>
@stop
