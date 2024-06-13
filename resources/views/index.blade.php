<!DOCTYPE html>
<html lang="en">

<head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />


<style>
       body {
    background-image: url('./logo/CampusImage.png');
    background-size: cover;
    background-repeat: no-repeat;
     /* Center the image both horizontally and vertically */
}

        .container {
            border-radius: 20px;
            box-shadow: 1px 1px 10px gray;
        }
    </style>
    <title>NUB</title>

</head>

<body>

<div class="container p-4" style="margin-top:150px;">
    <div class="row">
        <div class="col-lg-4" style="border-right:2px solid black;" >

                <div class="row text-center">
                    <div class="col-lg-5 my-4"  >
                        <img src="{{ asset('logo/Artboard 1 copy.png') }}" class="img-fluid">
                    </div>
                    <div class="col-lg-7">
                       
                        <a href="index.php" style="text-decoration: none;color: rgb(5, 2, 12);"> <h1 class="text-center my-5">Northern University Bangladesh</h1> </a> 
                    </div>
                </div>
           
        </div>
        <div class="col-lg-8"  >
            <div class="row">
                <div class="col-lg-12">
                    <div class="display-1 text-center">
                        <a href="index.php" style="text-decoration: none;color: rgb(5, 2, 12);font-weight: bold;">N U B </a> 
                        <hr>
                    </div>
                </div>
                <div class="col-lg-12 text-center my-4">
                    <div class="row">
                        <div class="col-lg-4">
                            <a href="{{url('teacher-login')}}" class="btn btn-outline-dark" style="width:11rem;"><h4>Teacher</h4></a>      
                        </div>
                        <div class="col-lg-4">
                        <a href="{{url('teacher-login')}}" class="btn btn-outline-dark" style="width:14rem;"><h4>Admin</h4></a>     
                        </div>
                        <div class="col-lg-4">
                            <a href="{{url('student-login')}}" class="btn btn-outline-dark" style="width:11rem;"><h4>Student</h4></a>     
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>




</body>

</html>
