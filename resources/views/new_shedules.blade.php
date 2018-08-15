@extends('layouts.master')
@section('content')


<div class="container">
<div class="row">
<div class="jumbotron col-md-12">

    <h1>Schedule for {{$selected_movie_data['title']}}</h1>



  {{--<!--   array:4 [▼
  "id" => 1
  "title" => "Sky Scrapper"
  "type" => "Action"
  "image_location" => "/storage/ace45qC56x4NmZwtoJ2Yx2QSYHtJAoaLKP3vqW4R.jpeg"
] -->    --}} 
  </div>     
</div>




<div class="float-right shedule"><a type="button" href="{{url('schedule')}}"class="btn btn-primary adding_new" >New Shedule</a></div>
<br>
<br>
@if(count($errors)>0)
    <div class="alert alert-danger alert-dismissable">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>

    </div>
    @endif
    @if(\Session::has('success'))
    <div class="alert alert-success alert-dismissable">
      {{(\Session::get('success'))}}
    </div>
    @endif



<div class="row">
     <div class="col-md-2">
      Start Date : {{current($all_dates_in_range)->format('Y-m-d')}}
      
      
      

    </div> 
    <div class="col-md-8">
     
    </div>
    <div class="col-md-2 ">
      End Date : {{end($all_dates_in_range)->format('Y-m-d')}}
      
      
      

    </div>     
</div>




<!--model class  -->

  <div class="modal fade center " id="schedule_button_clicked" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Schdule for Schedule for {{$selected_movie_data['title']}} </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          
          <form id="form1" name="form1" method="post" action="{{url('adding_to_schedule')}}">
            {{csrf_field()}}
          <input class="col"  type="hidden"  name="first_date"  value="{{reset($all_dates_in_range)->format('Y-m-d')}}" readonly="readonly" >
          <input class="col" type="hidden"  name="last_date"  value="{{end($all_dates_in_range)->format('Y-m-d')}}" readonly="readonly" >
          <input type="hidden" id="movie_id" name="movie_id" value="{{$id}}">
          <input type="hidden" id="movie_day" name="date" value="">
          <div class="form-group col-md-12">
             <div class="">
                <label for="message-text" class="col-form-label">Set Time</label>
             </div>
             <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="Time">Hrs</label>
                  <select id="time_hrs" name="time_hrs" class="form-control">
                    <option selected value="">Hrs</option>
                    <option value="00">00</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputState">Mins</label>
                  <select id="time_min" name="time_min" class="form-control">
                    <option selected value="">Min</option>
                    <option value="00">00</option>
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="45">45</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputZip">AM/PM</label>
                   <select id="time_am_pm" name="time_am_pm" class="form-control">
                    <option value="">AM/PM</option>
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                  </select>
                </div>
              </div>

            </div>



                    
              
             

           
           <div class="col-md-12">
              <label for="message-text" class="col-form-label">Price</label>
              <input type="text" class="form-control" id="movieprice" name="price" value="10000" >
           </div>
          
     
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          <button type="submit" class="btn btn-primary" form="form1" value="Submit">Save Schedule</button>
         
        </div>
      </div>
    </div>
  </div>

 



    {{-- This comment will not be present in the rendered HTML --}}
{{--
<!-- <div class="row lead">
      <div class="col-md-2">Date</div>
      <div class="col-md-2">Time</div>
      <div class="col-md-3">Movie Title</div>
      <div class="col-md-2"> Price</div>
      <div class="col-md-1">Edit</div>
      <div class="col-md-2">Delete</div>

    </div>
  @if(!$movie_being_edited)
    <form method="post" enctype="multipart/form-data" action="{{url('schedules')}}">

      
    <div class="row" id="adding_to_shedule">
      
      <div class="col-md-2">
            {{csrf_field()}}
            <input class="form-control" type="text" placeholder="Date" name="date" id="datepicker">
     </div>
       <div class="col-md-2">
        <select class="custom-select" name="time" style="padding:0px;margin: 0px">
          <option selected>Start Time</option>
          <option value="10:00">10:00am</option>
          <option value="12:00">12:00am</option>
          <option value="14:00">2:00pm</option>
          <option value="18:00">6:00pm</option>
          <option value="22:00">10:00pm</option>
         </select>
       </div>
       <div class="col-md-3">
        <select class="select2 form-control form-control-lg " name="movie_id" style="width: 100%">
          @if($available_movies_to_add)
          @foreach($available_movies_to_add as $movie)
          <option value="{{$movie->id}}">{{$movie->title}}</option>
          @endforeach
          @endif
        </select>
       </div>
     
      <div class="col-md-2">
        <input class="form-control" type="text" name="price" placeholder="Price">
      </div>
     
      <div class="col-md-1">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
    
    </div>
    </form>
    @endif






       @if($movie_being_edited)
    
    <form method="post" enctype="multipart/form-data" action="{{action('SheduleController@update',$movie_being_edited->id)}}">

  <input type="hidden" id="method" name="_method" value="PATCH">
  
    <div class="row" id="adding_to_shedule">
      
      <div class="col-md-2">
            {{csrf_field()}}
            <input class="form-control" type="text" placeholder="Date" name="date" id="datepicker" value="{{$movie_being_edited->date}}">
     </div>
       <div class="col-md-2">
        <select class="custom-select" value="{{$movie_being_edited->name}}" name="time" style="padding:0px;margin: 0px">
          <option selected>Start Time</option>
          <option value="10:00">10:00am</option>
          <option value="12:00">12:00am</option>
          <option value="14:00">2:00pm</option>
          <option value="18:00">6:00pm</option>
          <option value="22:00">10:00pm</option>
         </select>
       </div>
       <div class="col-md-3">
        <select class="select2 form-control form-control-lg " name="movie_id" style="width: 100%">
          @if($available_movies_to_add)
          @foreach($available_movies_to_add as $movie)
          <option value="{{$movie->id}}">{{$movie->title}}</option>
          @endforeach
          @endif
        </select>
       </div>
      
      <div class="col-md-2">
        <input class="form-control" type="text" value="{{($movie_being_edited->price)}}" name="price" id="movieprice" placeholder="Price">
      </div>
     
      <div class="col-md-1">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
    
    </div>
    </form>
    @endif --> -->
--}}

    

         


       <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Schedules</th>
    </tr>
  </thead>
  <tbody>


    @foreach($all_dates_in_range as $date)
    <tr>
      <th scope="row">{{$date->format('l')}}</th>
      <td><button class="btn btn-primary adding_to_schedule" date="{{$date->format('Y-m-d')}}">Add ShowTime</button></td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    @endforeach
    

  </tbody>
</table>
        
   


</div>
<br>
<br>
<br>


<script type="text/javascript">


 

  

  $( document ).ready(function() 
{
    var date = "{{($last_sheduled_date)}}";

    var date_date = new Date("{{$last_sheduled_date}}");
    alert(date_date);
    
    

    

        $(".adding_to_schedule" ).on( "click", function() 
    {
      console.log( $( this ).text() );
      console.log("day="+this.getAttribute('date'));


      



      var get_next_weeks_monday =  function(startDate, endDate) 
      {
            var d = new Date();
            d.setDate(d.getDate() + (1 + 7 - d.getDay()) % 7);
            console.log(d);
      };



      

      
      document.getElementById("movie_day").value = this.getAttribute('date'); 
      console.log("{{$id}}");


      $('#schedule_button_clicked').modal();


      // Returns an array of dates between the two dates
      var getDates = function(startDate, endDate) 
      {
            var dates = [],
            currentDate = startDate,
            addDays = function(days) 
            {
              var date = new Date(this.valueOf());
              date.setDate(date.getDate() + days);
              return date;
            };
            while (currentDate <= endDate) {
              dates.push(currentDate);
              currentDate = addDays.call(currentDate, 1);
            }
        return dates;
      };


      //adds days to a given date taking care of the months
      var add_dates = function(given_date,days) 
      {
       var date = new Date();
       date.setDate(given_date.getDate() + days);
      return date;
      };



    


      
    });
});



</script>

@endsection('content')
