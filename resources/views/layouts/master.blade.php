<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bare - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    


    <!-- Custom styles for this template -->
    <style>
      body {
        padding-top: 54px;
      }
      @media (min-width: 992px) {
        body {
          padding-top: 56px;
        }
      }

    </style>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Cinema Booking Online</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{URL('/home')}}">Book Movie
              
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL('/booked_movies')}}">Booked Movies <span class="badge badge-light">4</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL('/shedule')}}">Managed Schedules</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL('/add_movies')}}">Add Movies</a>
            </li>

            <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">User Name</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Log Out</a>
    </div>
  </li>

          </ul>
        </div>
      </div>
    </nav>

          @yield('content')

<!-- Bootstrap core JavaScript -->
    <!-- <script src="vendor/jquery/jquery.min.js"></script>-->
    <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->

    <script src="{{ asset('js/app.js') }}" defer></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

  </body>

</html>
