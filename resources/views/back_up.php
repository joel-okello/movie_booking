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
              src="{{$selected_movie_data['image_location']}}" 
              alt="Card image cap">
        
    </div>
  
 
<div class="col-md-8">








      <div class="container">
        <h2>Toggleable Pills</h2>
        <br>
        <!-- Nav pills -->
        <ul class="nav nav-pills" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="pill" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#menu1">Menu 1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="pill" href="#menu2">Menu 2</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div id="home" class="container tab-pane fade"><br>
            <h3>HOME</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          </div>
          <div id="menu1" class="container tab-pane fade"><br>
            <h3>Menu 1</h3>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
          <div id="menu2" class="container tab-pane fade"><br>
            <h3>Menu 2</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
          </div>
        </div>
      </div>






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
      <div class="col-md-12 text-center">
        <h1>{{$selected_movie_data['title']}}</h1>
      </div>
       
       
              
      <div class="col-md-8">
          <label for="recipient-name" class="col-form-label">Select Prefferd Date</label>
          <select class="select2 form-control form-control-lg date_chosen" name="first_seat_option" >

          @if($selected_movie_shedules)
          @foreach($selected_movie_shedules as $row)
            <option  
                 class="col {{$row->date->format('l')}} movies_header" 
                 date="{{$row->date->format('l')}}" 
                 value="{{$row->date->format('l')}}">
                 {{$row->date->format('l')}}
                  
            </option>
          @endforeach
          @endif
          </select>
       </div>


       <div class="row lead">
          
            <div class="col-md-3">Showing on</div>
            <div class="col-md-3">Time</div>
            <div class="col-md-3">Price</div>
            
            
        </div>

       @if($selected_movie_shedules)
        @foreach($selected_movie_shedules as $row)
        <div class="row {{$row->date->format('l')}} movies_show" >
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
        @endforeach
       @endif
      
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


