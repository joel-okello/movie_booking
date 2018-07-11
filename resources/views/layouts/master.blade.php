<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bare - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->


    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- <script src="{{ asset('js/jquery-min.js') }}"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>-->
   


    
    


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





<link rel="stylesheet" href="{{ asset('jquery-ui/jquery-ui.min.css') }}" >
<script src="{{ asset('jquery-ui/external/jquery/jquery.js') }}" ></script>
<script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>



<link href="{{ asset('select2/css/select2.min.css') }}" rel="stylesheet" />
<script src="{{ asset('select2/js/select2.min.js') }}"></script>

<script type="text/javascript">
  // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
    alert("done jhbbjhb");
    $( "#date" ).datepicker();
    
});


</script>

  </body>

</html>
