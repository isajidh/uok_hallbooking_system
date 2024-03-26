<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<style>
    header {
        background-color: #3b495f;
        padding: 1rem;
    }
    .navbar-nav li a {
  color: #fafafb;
  font-weight: 400;
  font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
}
.dropdown-menu{
        background-color: #3b495f;
        padding: 1rem;
    
}
h3{
  color: #fafafb;
  font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; 
  font-weight: 400;
}
</style>
</head>
<body>
  <header class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-3">
            <a href="/">
          <img src="{{ asset('images/kln-logo.png') }}" alt="Logo" class="img-fluid" ></a>
        </div>
        <div class="col-md-3 text-center pt-2">
            <h3 >Hall Booking System</h3>
        </div>
        <div class="col-md-6">
          <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Facilities
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Book a Hall</a></li>
                    <li><a class="dropdown-item" href="#">Inquiries</a></li>
                    <li><a class="dropdown-item" href="/users">Users</a></li>
                    <li><a class="dropdown-item" href="#">Sample #</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdownAbout" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    About
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Our Team</a></li>
                    <li><a class="dropdown-item" href="#">Our History</a></li>
                    <li><a class="dropdown-item" href="#">Sample #</a></li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contact</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
  </header>

  <main>
    @yield('content') 
</main>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
    $('.dropdown').hover(function() {
      $(this).addClass('show.bs.dropdown');
    }, function() {
      $(this).removeClass('show.bs.dropdown');
    });

     // Handle clicks anywhere in the document (for closing on outside click)
  $(document).on('click', function(e) {
    if (!$(e.target).closest('.dropdown').length) {
      $('.dropdown').removeClass('show.bs.dropdown');
    }
  });
  });
</script>
</body>