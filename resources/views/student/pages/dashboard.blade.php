
@extends('student.layout.default')

@section('stud')


<!-- Sidebar -->


<!-- end of sidebar -->

<div
        id="intro-example"
        class=" background p-5 text-center bg-image"
        style="background-image: url('/img/p1.jpg');background-size: cover"

>
    <!-- <div class="mask" style="background-color: rgba(68,82,247,0.8);">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-light">
                <h1 class="mb-3">NORTHERN UNIVERSITY BANGLADESH</h1>
                <h5 class="mb-4">Knowledge for Innovation</h5>
                <a
                        class="btn btn-outline-light btn-lg m-2"
                        href="http://localhost:8086"
                        role="button"
                        rel="nofollow"
                        target="_blank"
                >Start </a
                >

            </div>
        </div>
    </div> -->

    <!-- For Photo -->
    <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body text-center">
                  <img src="data:image/png;base64,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" alt="avatar"
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
                      <p class="text-muted mb-0">{{ session('userstudentid') }}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{ session('useremail') }}</p>
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







<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

@stop