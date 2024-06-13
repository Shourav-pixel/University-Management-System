<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
<style>
     body, html {
        height: 100%;
        background-repeat: no-repeat;
        background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
        background-image: url('./logo//campus.jpg');
        background-size: cover; 
    }

    .wrapper {
        margin-top: 50px;
        margin-bottom: 20px;
    }

    .form-signin {
        max-width: 420px;
        padding: 10px 38px 66px;
        margin: 0 auto;
        background-color: rgba(238, 238, 238, 0.7); /* Set the background color to semi-transparent light grey */
        border: 3px dotted rgba(0,0,0,0.1);
        border-radius: 5px;
    }

    .form-signin-heading {
        text-align: center;
        margin-bottom: 20px;
        color: darkblue;
    }

    .form-control {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        background-color: transparent; /* Set the background color of form elements to transparent */
        border: none; /* Remove the borders */
        border-bottom: 1px solid #ccc; /* Add a bottom border for a better visual */
        font-weight: bold; /* Make the placeholder values bold */
        color: #333;
    }

    input[type="text"],
    input[type="password"] {
        margin-bottom: 20px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        opacity: 0.9; /* Set the opacity to make the elements semi-transparent */
    }

    .btn-primary {
        opacity: 0.9; /* Set the opacity of the button */
    }
</style>
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="wrapper">
        <form class="form-signin"method="post" action="{{ url('teacherlogin-store') }}">
            {{ csrf_field() }}
            <h3 class="form-signin-heading">
                <img src="./logo//NUB-logo.png" style="width: 345px;height:100px" alt="Alternate Text" />
            </h3>

            <div>
                <!-- <input type="text" class="form-control" name="name" placeholder="Username" required="" autofocus="" /><br/> 

                <input type="text" class="form-control" name="id" placeholder="Student-Id" required="" autofocus="" /><br/> 

                <input type="number" class="form-control" name="phone_number" placeholder="Phone Number" required="" autofocus="" /><br />  -->

                <input type="email" class="form-control" name="email" placeholder="Email" required="" autofocus="" /><br/> 
         
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />

                <div class="g-recaptcha" data-sitekey="6Ld1CFMpAAAAAP6UPGKXEwhYCtgtOMC5SZcb6mKv"></div>

<br>

                <button class="btn btn-lg btn-primary btn-block" name="Submit" value="Login" type="Submit">Login</button>

                <div class="card-footer">
				
            </div>
            <br>
            <center><div class="d-flex justify-content-center links">
					Don't have an account?<a href="{{ url('teacher-register') }}">Sign Up</a>
				</div></center>

           
        </form>
    </div>
</div>
</body>
</html>
