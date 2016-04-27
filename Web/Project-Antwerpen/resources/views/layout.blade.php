<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/font-awesome.min.css">
    </head>
    <body>
    <div class="navbar ">
      <div class="">

        <div class="navbar-header">
          <a class="navbar-left" href="/home"><img src="../../img/A_logo_RGB_123x123.jpg" alt="Logo antwerpen"/></a>
          <a class="navbar-left titelpage" href="/home">Antwerpen Projecten</a>
        </div>

        <ul class="nav navbar-nav navbar-right">
         <li><a href="/register"><span class="fa  fa-pencil "></span> Sign Up</a></li>
         <li><a href="#"><span class="fa  fa-sign-in "></span> Login</a></li>
       </ul>

      </div>
    </div>

    @yield('content')

    <footer class="footer">
        <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
    </div>
</footer>
</html>
