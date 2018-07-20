<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cinema Show Bookings</title>>

    <!-- Bootstrap core CSS -->


    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
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
            
            <li class="nav-item">
              <a class="nav-link" href="{{URL('/bouncer')}}">Todays Movies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{URL('/check_ticket')}}">Check Ticket</a>
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
    direction: [0, 1]
});






   $("#ticket_passed").hide();
   $("#ticket_failed").hide();


// // prevent changing weeks and months
// var weekOptions = { "changeMonth": false, "changeYear": false, "stepMonths": 0, beforeShowDay: function (date) {
//     return [date.getDay() == 1, ''];
//   } 
// };






    
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
     alert("Successfully added to schedule");
         
              
        },
        error: function(xhr,status) {
          alert("Data: "+xhr+status);
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
