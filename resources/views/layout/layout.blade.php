<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-s8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <link rel="stylesheet" href="css/app.css">
    <script src="js/app.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="/hospitals/index">Hospitals </a>
        <a class="nav-link" href="/doctors/index">Doctor </a>
        <a class="nav-link" href="/patients/index">AdminHospitals </a>
        <a class="nav-link" href="/drugs/index">Drugs </a>
      </li>
    </ul>
  </div>
</nav>

<div class="container">
@yield('content')
</div>

</body>
</html>