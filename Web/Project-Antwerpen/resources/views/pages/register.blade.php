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
                        <h3 class="panel-title text-center">Registreren</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="/register">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                            <div class="form-group">
                                <input type="text" name="first_name" id="first_name" class="form-control input-md" placeholder="Voornaam" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" id="last_name" class="form-control input-md" placeholder="Achternaam" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-md" placeholder="Email adres" required>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="age" id="age" min="0" max="120" class="form-control input-md" placeholder="Leeftijd">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="postalcode" id="postcode" class="form-control input-md" placeholder="Postcode">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <select class="c-select form-control input-md" name="gender">
                                    <option selected>Geslacht</option>
                                    <option value="1">Man</option>
                                    <option value="2">Vrouw</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control input-md" placeholder="Wachtwoord" required>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-md" placeholder="Bevestig wachtwoord" required>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Registreer" class="btn btn-danger btn-block">
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
