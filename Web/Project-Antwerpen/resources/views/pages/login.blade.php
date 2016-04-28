<!-- Wordt niet meer gebruikt!   -->

@extends('layout')

@section('title')
  Home
@stop

@section('content')
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"   integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="   crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="page-header">
        </div>
        <!-- Registration Form - START -->
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="/register">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-md" placeholder="Email adres" required alt="vul je email adres in">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control input-md" placeholder="Wachtwoord" required alt="vul je wachtwoord in">
                            </div>
                            
                            
                            <input type="submit" value="Login" class="btn btn-danger btn-block" alt="login knop">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <style>
        .centered-form {
            margin-top: 120px;
            margin-bottom: 120px;
        }
        </style>
       <script type="text/javascript">
    var password = document.getElementById("password"),
    confirm_password = document.getElementById("password_confirmation");

function validatePassword() {
    if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Wachtwoord komt niet overeen");
    } else {
        confirm_password.setCustomValidity('');
    }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>

        <!-- Registration Form - END -->
    </div>
</body>

</html>
@stop