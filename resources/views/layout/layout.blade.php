<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fiber Academy</title>

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous"/>

    {{-- Shortcut --}}
    <link rel="shortcut icon" href="/images/thumbnail.png" />
    
    {{-- Icons --}}
    <script src="https://kit.fontawesome.com/e092287e28.js" crossorigin="anonymous"></script>

    {{-- Navbar --}}
    <div class="container">
      <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="col-xl-10">
          <a class="navbar-brand ml-5" href="#"><img src="/images/thumbnail.png" width="50" height="40" class="d-inline-block align-center mb-2" alt=""> <b>Fiber Academy</b></a>
        </div>
        <div class="row align-items-end">
          <div class="col-12">
             <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Lim 1</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Lim 2</a>
                </li>
             </ul>
          </div>
        </div>
         </div>
        </nav>
      </div>
    </div>
</head>

<body>
  @yield('content')
</body>

<script>
  // event will be executed when the toggle-button is clicked
  document.getElementById("button-toggle").addEventListener("click", () => {

      // when the button-toggle is clicked, it will add/remove the active-sidebar class
      document.getElementById("sidebar").classList.toggle("active-sidebar");

      // when the button-toggle is clicked, it will add/remove the active-main-content class
      document.getElementById("main-content").classList.toggle("active-main-content");
  });
</script>

</html>