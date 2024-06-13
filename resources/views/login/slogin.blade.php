<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Add the reCAPTCHA script -->
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
            background-color: rgba(238, 238, 238, 0.7);
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
            background-color: transparent;
            border: none;
            border-bottom: 1px solid #ccc;
            font-weight: bold;
            color: #333;
        }

        input[type="email"],
        input[type="password"] {
            margin-bottom: 20px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            opacity: 0.9;
        }

        .btn-primary {
            opacity: 0.9;
        }
    </style>
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <div class="wrapper">
            <form class="form-signin" method="post" action="{{ url('studentlogin-store') }}">
                {{ csrf_field() }}
                <h3 class="form-signin-heading">
                    <img src="./logo//NUB-logo.png" style="width: 345px;height:100px" alt="Alternate Text" />
                </h3>

                <input type="email" class="form-control" name="email" placeholder="Email" required="" autofocus="" /><br/> 
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />

                <!-- Add the reCAPTCHA div -->
                <div class="g-recaptcha" data-sitekey="6Ld1CFMpAAAAAP6UPGKXEwhYCtgtOMC5SZcb6mKv"></div>

                <br>

                <button class="btn btn-lg btn-primary btn-block" name="Submit" value="Login" type="Submit">Login</button>

                <br>
                <center>
                    <div class="d-flex justify-content-center links">
                        Don't have an account?<a href="{{ url('student-register') }}">Sign Up</a>
                    </div>
                </center>
            </form>
        </div>
    </div>
</body>
</html>
