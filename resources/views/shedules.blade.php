@extends('layouts.admin_master')
@section('content')


<div class="container">
<div class="row">
<div class="jumbotron col-md-12">
    <h1>Movie Schedules</h1>      
  </div>     
</div>




<div class="float-right shedule">
  <button class="btn btn-primary adding_to_schedule">Schedule New Movie</button>
</div>
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

    




    <!--model class  -->

  <div class="modal fade center " id="schedule_button_clicked" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Schdule for Schedule for {{"Movie Title"}} </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          
          <form id="form1" name="form1" method="post" action="{{url('schedules')}}">
            {{csrf_field()}}
          
          <div class="movie_id">
            <label for="message-text" class="col-form-label">Select a movie</label>

           <select class="select2 form-control form-control-lg hide_if_old"
           id="movie_id1" name="movie_id1" style="width: 100%">
            @if($available_movies_to_add)
            @foreach($available_movies_to_add as $movie)
            <option value="{{$movie->id}}">{{$movie->title}}</option>
            @endforeach
            @endif
          </select></div>
          <div class="form-group col-md-12">
             <div class="col-md-12">
                {{csrf_field()}}
                <label for="message-text" class="col-form-label">Pick a date</label>
                <input class="form-control" type="text" placeholder="Date" name="date" id="datepicker1" style="width: 200px" readonly="readonly">
             </div>
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






    

        
        @if($movie_being_edited)
          <div class="row lead">
            <div class="col-md-2">Date</div>
            <div class="col-md-3">Time</div>
            <div class="col-md-3">Movie Title</div>
            <div class="col-md-2"> Price</div>
            <div class="col-md-1"></div>
         </div>
         <div class="row" style="margin-bottom: 100px">
         <form  method="post" enctype="multipart/form-data" action="{{action('SheduleController@update',$movie_being_edited->id)}}">

          <input type="hidden" id="method" name="_method" value="PATCH">
  
          <div class="row" id="adding_to_shedule" >
      
            <div class="col-md-2">
                    {{csrf_field()}}
                    <input class="form-control" type="text" placeholder="Date" name="date" id="datepicker" value="{{$movie_being_edited->date}}">
            </div>
            <div class="col-md-4">
              <div class="form-row">
                <div class="form-group col-md-4">
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
                <div class="form-group col-md-4">
                  <select id="time_min" name="time_min" class="form-control">
                    <option selected value="">Min</option>
                    <option value="00">00</option>
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="45">45</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                   <select id="time_am_pm" name="time_am_pm" class="form-control">
                    <option value="">AM/PM</option>
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                  </select>
                </div>
              </div>
       </div>
       <div class="col-md-3">
        <select class="select2 form-control form-control-lg"
         id="


         " name="movie_id" style="width: 100%">
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
        <button type="submit" class="btn btn-success">Update</button>
    </div>
    
    </div>
    </form>
    </div>
    @endif
    


    <table class="table table-striped table-hover">




     <thead>
      <th >Date</th>
      <th>Time</th>
      <th>Movie Title</th>
      <th> Price</th>
      <th>Edit</th>
      <th>More Show Times</th>
      <th>Delete</th>

     </thead>
     <tbody>
        
       
       @if($sheduledmovies)
       @foreach($sheduledmovies as $row)
        <tr>
            <td>{{$row->date}}</td>
            <td>{{$row->time}}</td>
            <td>{{$row->title}}</td>
            <td>{{$row->price}}</td>
            <td >
             <a href="{{action('SheduleController@edit',$row->id)}}">Edit</a>
            </td>

            <td><button 

              movie_id ="{{$row->movie_id}}"
              title="{{$row->title}}"
              date ="{{$row->date}}" 
              class="btn btn-primary adding_to_schedule" 
              id="{{$row->id}}">Add ShowTime</button>
            </td>
            <td>
              <form method="post" action="{{action('SheduleController@destroy',$row->id)}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger" value="Edit">Remove Show</button>
             </form> 
            </td>
            



        </tr>
          @endforeach 
          @endif

      </tbody>
          
     </table>
   


</div>
<br>
<br>
<br>
<script type="text/javascript">



  

   $( document ).ready(function() 
 {
     $('#datepicker1').Zebra_DatePicker({
    direction: [0, 1]
    });


        $(".adding_to_schedule" ).on( "click", function() 
    {      
      //try set the date picker date to the selected row's date 
      $('#datepicker1').val(this.getAttribute('date'));
      $('#movie_id1').val(this.getAttribute('movie_id'));
     
     
      if($('#movie_id1').val())
      {
        
        $('.modal-title').text("Schedule "+this.getAttribute('title'));
        
        $('.movie_id').hide()
      }
      else
      {
        $('.modal-title').text("Schedule Your Movie ");

      }
      
  
      $('#schedule_button_clicked').modal();
      
  
    });



       

         $(".adding_new_to_schedule" ).on( "click", function() 
    {
      
     
      $('.modal-title').text("Schedule "+this.getAttribute('title'));
      
      $('#movie_id').val(this.getAttribute('movie_id'));
      $('#datepicker1').val(this.getAttribute('date'));
      

  
      $('#schedule_new_button_clicked').modal();
      
      

  
    });
  });



</script>



@endsection('content')
