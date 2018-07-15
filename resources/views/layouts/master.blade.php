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
    <script src="{{ asset('js/jquery-min.js') }}"></script>
    <script src="{{ asset('select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/zebra_datepicker.min.js') }}"></script>
 
     <script src="{{ asset('js/popper.js/1.14.3/umd/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
   


    
    


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
              <a class="nav-link" href="{{URL('/show_movies_on_shedule')}}">Book Movie
              
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL('/booked_movies')}}">Booked Movies <span class="badge badge-light">4</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL('/schedule')}}">Managed Schedules</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL('/add_movies')}}">Add Movies</a>
            </li>

            <li class="nav-item dropdown">
    <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>


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








<link rel="stylesheet" href="{{ asset('css/zebra_datepicker.min.css') }}">
<link href="{{ asset('select2/css/select2.min.css') }}" rel="stylesheet" />


<script type="text/javascript">
  // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.select2').select2();

   $('#datepicker').Zebra_DatePicker({
    direction: 1
});



// // prevent changing weeks and months
// var weekOptions = { "changeMonth": false, "changeYear": false, "stepMonths": 0, beforeShowDay: function (date) {
//     return [date.getDay() == 1, ''];
//   } 
// };






    
});

$( ".selected_movie" ).on('click', function() {

  // console.log('this.name = ', this);


  // alert( "Handler for .click() called." );
  var x = this.getAttribute("name");
  // alert(x);


// 
      $.ajax({
        url: "old1",
        type: "get", //send it through get method
        data: { 
          id:x
          
        },
        success: function(response,status) {

          console.log('response=', response);
        

          
            alert(response);
          

           
        },
        error: function(xhr,status) {
          alert("Data: "+xhr+status);
        }
      });
    
 });



$( ".select_shedule_for_movie" ).on('click', function() {

  // console.log('this.name = ', this);


  // alert( "Handler for .click() called." );
  var x = this.getAttribute("shedule_id");
  console.log('shedule_id=', x);


// 
      $.ajax({
        url: "http://127.0.0.1:8000/retrieve_schedule_info",
        type: "get", //send it through get method
        data: { 
          id:x
          
        },
        success: function(response,status) {

          console.log('response=', response);
        

  
       document.getElementById("moviename").value = response.title;
      document.getElementById("moviedate").value = response.date;
      document.getElementById("movietime").value = response.time;
      document.getElementById("movieprice").value = response.price;
      document.getElementById("shedule_id").value = response.id;
      
            $("#exampleModal").modal();
            

            

//             id  2
// date  "2018-07-14"
// time  "10:00:00"
// price "12000.00"
// movie_id  2
// title "Today Feast"
// type  "Action"
// image_location  "/storage/PXxo2VWSPsHztxbWsAMFPfbfIi8rEZB8yCzkd7Mc.jpeg"
          

           
        },
        error: function(xhr,status) {
          alert("Data: "+xhr+status);
        }
      });
    
 });






</script>

  </body>


</html>
