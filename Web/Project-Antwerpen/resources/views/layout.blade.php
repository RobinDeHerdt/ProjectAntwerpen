<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/toggle-switch.css" />
    </head>
    <body>
      <div class="navbar">
          <div class="navbar-header">
            <a class="navbar-left" href="/overview"><img src="../../img/A_logo_RGB_123x123.jpg" alt="Logo antwerpen"/></a>
            <a class="navbar-left titelpage" href="/overview">Antwerpen Projecten</a>
          </div>

         <!--  <ul class="nav navbar-nav navbar-right">
           <li><a href="/register"><span class="fa  fa-pencil "></span> Sign Up</a></li>
           <li><a href="/login"><span class="fa  fa-sign-in "></span> Login</a></li>
          </ul> -->
         <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <!-- Authentication Links -->
              @if (Auth::guest())
                  <li><a href="{{ url('/login') }}"><span class="fa fa-btn fa-sign-out" ></span> Login</a></li>
                  <li><a href="{{ url('/register') }}"><span class="fa fa-btn fa-pencil" ></span> Register</a></li>
              @else
                <li id="welcome">Welkom, {{ Auth::user()->firstname }}</li>
                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></li>
              @endif
            </ul>
        </div>

      </div>

      @yield('navigation-layout')

    @yield('content')
     <footer class="footer">
        <div class="container">
        <p>&copy Stad Antwerpen</p>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="../../js/sort.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    </body>
</footer>
</html>
