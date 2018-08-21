 @extends('layouts.master')
@section('content')

<div class="container">

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
            <div class="col-md-12"><div class="form-group">
              <label for="recipient-name" class="col-form-label">Movie Title:</label>
              <input type="hidden"  id="shedule_id" name="shedule_id" value="" >
              <input type="text" class="form-control" id="moviename" name="title" value="" readonly="readonly">
            </div>
          </div>
            
                
                <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-4 col-md-push-2">
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

            <div class="col-md-12">
              <label for="message-text" class="col-form-label">Number of Seats</label>
              <input type="number" class="form-control" id="number_of_seats" name="number_of_seats" value="1" >
            </div>
          </div>
          
          
            <div class="col-md-12">
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
     <div class="col-md-12">
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


<div class="row">
   <div class="jumbotron col-md-12">

    <h1>Schedule summary for all movies</h1>

  </div>     
</div>
<div class="row">
 <table class="table table-striped">
  <thead>
    <tr>
     
      <th scope="col">Movie</th>
      @foreach($all_dates_in_range as $date )
      <th scope="col">{{$date->format('l')}} {{$date->format('Y-m-d')}}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach($movies as $key => $movie)
    <tr>
      <th class="movie_on_day"  movie="{{$movie->id}}">
        <a href="{{action('SheduleController@view_details',$movie->id)}}">{{$movie->title}}</a>
      </th>
      @foreach($all_dates_in_range as $key_for_date => $date)
      @if($schedule_for_dates[$key][$key_for_date])
      
      
      <td >
      
        @foreach($shows_in_the_days[$key][$key_for_date] as $show_time)   
     <button class="select_shedule_for_movie btn btn-outline-primary w-100" shedule_id="{{$show_time->id}}">{{"".$show_time->time." hrs"}}</button>
        
      @endforeach </td>
      
      @else
      <td></td>
      @endif
      @endforeach
    
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>


<script type="text/javascript">
  
  $(function() {
      $(".movie_that_day").on("click",function(){


  alert(this.getAttribute("date")+" "+this.getAttribute("movie"));

      });        



  })
</script>

@endsection('content')