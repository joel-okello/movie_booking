<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cinema Show Bookings</title>

    <!-- Bootstrap core CSS -->


     
  <link rel="stylesheet" href="{{ asset('css_js/css/zebra_datepicker.min.css') }}">
<link href="{{ asset('css_js/select2/css/select2.min.css') }}"rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css_js/css/bootstrap.min.css">
  <script src="{{ asset('css_js/js/jquery-min.js') }}"></script>
   <script src="{{ asset('css_js/js/popper.min.js')}}"></script>
    <script src="{{ asset('css_js/js/bootstrap.min.js') }}"></script>



    <script src="{{ asset('css_js/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('css_js/js/zebra_datepicker.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js "></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">


    
    


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
              <a class="nav-link" href="{{URL('/booked_movies')}}">Booked Movies 
                @auth
                
              @if(App\User::has_booked_movies()) 
              <span class="badge badge-light">
              {{App\User::has_booked_movies()}} 
              </span>
              @endif
              
              @endauth
               </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL('/summary_schedule')}}">Week Schedule</a>
            </li>
          </ul>


          <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
        </div>
      </div>
    </nav>
  <div class="modal fade center " id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Select your preferecences</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          
          <form id="form1" name="form1" method="get" action="{{url('book_movie')}}">
            {{csrf_field()}}
            <div class="form-group form-row">
              <label for="recipient-name" class="col-form-label">Movie Title:</label>
              <input type="hidden"  id="shedule_id" name="shedule_id" value="" >
              <input type="text" class="form-control" id="moviename" name="title" value="" readonly="readonly">
            </div>
          
            
                
            <div class="form-group form-row mx-auto">
              <div class="col-md-4">
              <label for="recipient-name" class="col-form-label">Movie Date:</label>
              <input type="text" class="form-control" id="moviedate" name="date" value="" readonly="readonly">
            </div>
             <div class="col-md-3">
              <label for="recipient-name" class="col-form-label">Movie Time:</label>
              <input type="text" class="form-control" id="movietime" name="time" value="10:00pm" readonly="readonly">
            </div>
            <div class="col-md-3">
              <label for="message-text" class="col-form-label">Movie Price</label>
              <input type="text" class="form-control" id="movieprice" name="price" value="10,000" readonly="readonly">
            </div>
            </div>

            <div class="form-group form-row">
              <label for="message-text" class="col-form-label">Number of Seats</label>
              <input type="number" class="form-control" id="number_of_seats" name="number_of_seats" value="1" >
            </div>
          
          
          
            <div class="form-group form-row">
              <label for="recipient-name" class="col-form-label">Seat Option One:</label>
          <select class="select2 form-control form-control-lg first_seat_option" name="first_seat_option" style="width: 100%; height: 100%">
            <option value="">Select First Option</option>
            <optgroup label="Back">
            <option value="LeatBack">Leaf Back</option>
            <option value="CenterBack">Center Back</option>
            <option value="RightBack">Right Back</option>
            <optgroup label="Middle">
            <option value="LeftMiddle">Left Middle</option>
            <option value="MiddleMiddle">Middle Middle</option>
            <option value="RightMiddle">Right Middle</option>
            <optgroup label="Front">
            <option value="LeftFront">Left Front</option>
            <option value="MiddleFront">Middle Front</option>
            <option value="RightFront">Right Front</option>

            
          </select>
      </div>
     <div class="form-group form-row">
              <label for="recipient-name" class="col-form-label">Seat Option Two:</label>
          <select class="select2 form-control form-control-lg second_seat_option" name="second_seat_option" style="width: 100%; height: 100%">
          <option value="">Select Second Option</option>
          <optgroup label="Back">
           <option value="LeatBack">Leat Back</option>
            <option value="CenterBack">Center Back</option>
            <option value="RightBack">Right Back</option>
            <optgroup label="Middle">
            <option value="LeftMiddle">Left Middle</option>
            <option value="MiddleMiddle">Middle Middle</option>
            <option value="RightMiddle">Right Middle</option>
            <optgroup label="Front">
            <option value="LeftFront">Left Front</option>
            <option value="MiddleFront">Middle Front</option>
            <option value="RightFront">Right Front</option>

            
          </select>
      </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          <button type="submit" class="btn btn-primary" form="form1" value="Submit">Proceed to Pay</button>
         
        </div>
      </div>
    </div>
  </div>

          @yield('content')

<!-- Bootstrap core JavaScript -->
    <!-- <script src="vendor/jquery/jquery.min.js"></script>-->
    <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->









<script type="text/javascript">
  // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.select2').select2();

  $('#datepicker').Zebra_DatePicker({
    direction: [0, 1]
});






   $("#ticket_passed").hide();
   $("#ticket_failed").hide();







    
});




$( ".select_shedule_for_movie" ).on('click', function() {
  var x = this.getAttribute("shedule_id");
  console.log('shedule_id=', x); 
      $.ajax({
        url: "{{ url('retrieve_schedule_info') }}",
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
              
        },
        error: function(xhr,status) {
          alert("Data: "+xhr+status);
        }
      });
    
 });





$( ".start_checking_movie" ).on('click', function() {
  var x = this.getAttribute("shedule_id");
  console.log('shedule_id=', x); 
      $.ajax({
        url: "{{ url('set_to_check_ticket_for_movie') }}",
        type: "get", //send it through get method
        data: { 
          id:x
          
        },
        success: function(response,status) {

          console.log('response=', response);
     console.log("Successfully added to schedule");
         
              
        },
        error: function(xhr,status) {
          console.log("Data: "+xhr+status);
        }
      });
    
 });


$( "#submit_ticket_number" ).on('click', function() {


  
  var x = document.getElementById("ticket_number").value;
  console.log('ticket_number=', x); 
  $.ajax
   ({
              url: "{{ url('verify_ticket') }}",
              type: "get", //send it through get method
              data: { 
                id:x
                
              },
              success: function(response,status) 
        {

                console.log('response=', response);
                var status = response.status;
                console.log('status=',response.status);

           if(response.status=='activated')
           {    

              
                document.getElementById('number__of_booked_tickets').innerHTML = "Number of Seats: "+response.number;
                document.getElementById('ticket_number_passed').innerHTML = "Ticket id: "+x+"Ticket_No : "+response.ticket_number;
                
                
               $("#ticket_passed").show();
               $("#ticket_failed").hide();  }
           else
           {   
                document.getElementById('number__of_booked_tickets').innerHTML = "Number of Seats "+response.number;
                document.getElementById('ticket_number_failed').innerHTML = "Ticket Number: "+x;
                
               $("#ticket_passed").hide();
               $("#ticket_failed").show(); } 
                    
         },
              error: function(xhr,status)
         {
                console.log("Error Processing: "+xhr+status);
                $("#ticket_passed").hide();
               $("#ticket_failed").hide();
         }
   });
    
 });



</script>

  </body>


</html>
