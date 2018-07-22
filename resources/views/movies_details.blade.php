@extends('layouts.master')
@section('content')


    <!-- Page Content -->
<div class="container">
  <div class="row md-12">
  <div class="jumbotron col-md-12">
      <h1>Book now get off the hustle</h1>       
      
           <div class="col-md-6 col-md-offset-3">
            <div class="input-group input-group-lg">
              <input class="form-control" placeholder="Search" type="text">
     
              <button type="submit" class="btn btn-primary">Find</button>
            </div>
          </div>
        
    </div>     
  </div>

        
         

 <!--model class  -->

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

          
          <form id="form1" name="form1" method="post"action="{{url('show_movies_on_shedule')}}">
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
          <select class="select2 form-control form-control-lg " name="first_seat_option" style="width: 100%; height: 100%">
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
          <select class="select2 form-control form-control-lg " name="second_seat_option" style="width: 100%; height: 100%">
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






  <!-- Card Dark -->

@if($selected_movie_data)
  <div class="row">
    <div class="col-md-4">

        <img class="card-img-top" 
              src="{{Storage::url($selected_movie_data['image_location'])}}" 
              alt="Card image cap">
        
    </div>
  
 
<div class="col-md-8">





        <div class="row">
          <div class="col-md-12"> 
            @if(count($errors)>0)
            <div class="alert alert-danger alert-dismissable">
              <ul> 
                @foreach($errors->all() as $error)
                <li>Booking failed {{$error}}</li>
                @endforeach
              </ul>
            </div>
            @endif
            @if(\Session::has('success'))
            <div class="alert alert-success alert-dismissable">
              {{(\Session::get('success'))}}
            </div>
            @endif
        </div>
      </div>


      <div class="container">
        <div class="col-md-12 text-center">
        <h2>{{$selected_movie_data['title']}}</h2>
       </div>
        
        <h4>Showing on</h4>
        <ul class="nav nav-pills" role="tablist">


        @if($dates_movie_is_showing_obj)
        @foreach($dates_movie_is_showing_obj as $row)
          <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#{{$row->format('l')}}">{{$row->format('l')}}</a>
          </li>
        @endforeach
        @endif
          
        </ul>
          
        <!-- Tab panes -->
        <div class="tab-content">
           @if($selected_movie_shedules)
           @foreach($selected_movie_shedules as $row)
          <div id="{{$row->date->format('l')}}" class="container tab-pane fade"><br>
            
            <div class="row {{$row->date->format('l')}}" >
              <div class="col-md-3 {{$row->date->format('l')}}">{{$row->date->format('l')}}</div>
              <div class="col-md-3 {{$row->date->format('l')}}">{{$row->time}}</div>
              <div class="col-md-3 {{$row->date->format('l')}}"> {{$row->price}}</div>
              <div class="col-md-3  {{$row->date->format('l')}} select_option_div">
                  <button 
                  type="button" shedule_id ="{{$row->id}}" 
                  class="btn btn-light select_shedule_for_movie">
                    Book Movie
                  </button>
              </div>      
            </div>
          </div>
          @endforeach
          @endif
        </div>
      </div>






     
      
       
       
              
      
      
</div>
 @endif

  </div>

  <div class="row">

  
 

  </div>      
</div>
</br>
</br>
<div class="clearfix"></div>

<script type="text/javascript">
  $(function() {


        
             $(".movies_show").hide();

             var x = document.getElementsByClassName("date_chosen");
             alert(x);



             $( ".date_chosen" ).change(function() {
               var chosen_date = this.value;
               $(".movies_show").hide();
              $("."+chosen_date).show();
              
              });




  });

</script>

@endsection


