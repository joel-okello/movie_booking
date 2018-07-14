@extends('layouts.master')
@section('content')


    <!-- Page Content -->
<div class="container">
  <div class="row md-12">
  <div class="jumbotron col-md-12">
      <h1>Book now get off the hustle</h1>       
      <form >
           <div class="col-md-6 col-md-offset-3">
            <div class="input-group input-group-lg">
              <input class="form-control" placeholder="Search" type="text">
     
              <button type="submit" class="btn btn-primary">Find</button>
            </div>
          </div>
        </form>
    </div>     
  </div>

        
         

  <!--model class  -->

  <div class="modal fade center " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Select your preferecences</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="col-md-12"><div class="form-group">
              <label for="recipient-name" class="col-form-label">Movie Title:</label>
              <input type="text" class="form-control" id="moviename" name="moviename" value="" readonly="readonly">
            </div></div>
            <div class="col-md-6"><div class="form-group">
              <label for="recipient-name" class="col-form-label">Movie Date:</label>
              <input type="text" class="form-control" id="moviedate" name="moviedate" value="" readonly="readonly">
            </div></div>
             <div class="col-md-3"><div class="form-group">
              <label for="recipient-name" class="col-form-label">Movie Time:</label>
              <input type="text" class="form-control" name="movie" value="10:00pm" readonly="readonly">
            </div></div>
            <div class="col-md-3"><div class="form-group">
              <label for="message-text" class="col-form-label">Movie Price</label>
              <input type="text" class="form-control" name="moviename" value="10,000" readonly="readonly">
            </div>
          </div>
            <div class="col-md-12">
              <label for="recipient-name" class="col-form-label">Seat Option One:</label>
          <select class="select2 form-control form-control-lg " name="first_seat_option" style="width: 100%; height: 100%">
            <option value="AL">Leat Back</option>
            <option value="AL">Center Back</option>
            <option value="WY">Right Back</option>
            <option value="AL">Left Middle</option>
            <option value="AL">Middle Middle</option>
            <option value="WY">Right Middle</option>
            <option value="AL">Left Front</option>
            <option value="AL">Middle Front</option>
            <option value="WY">Right</option>
            <option value="AL">Leat Back</option>
            <option value="AL">Center Back</option>
            <option value="WY">Right Back</option>

            
          </select>
      </div>
      <div class="col-md-12">
          <label for="recipient-name" class="col-form-label">Seat Option Two:</label>
          <select class="select2 form-control form-control-lg " name="second_seat_option" style="width: 100%; height: 100%">
            <option value="AL">Alabama</option>
            <option value="WY">Wyoming</option>
          </select>
      </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Send message</button>
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
      <div class="col-md-12 text-center">
        <h1>{{$selected_movie_data['title']}}</h1>
      </div>
       
      <div class="row lead">
          
            <div class="col-md-3">Date</div>
            <div class="col-md-3">Time</div>
            <div class="col-md-3">Price</div>
            
            
        </div>

       @if($selected_movie_shedules)
        @foreach($selected_movie_shedules as $row)
        <div class="row">
              <div class="col-md-3">{{$row->date->format('l')}}</div>
              <div class="col-md-3">{{$row->time}}</div>
              <div class="col-md-3"> {{$row->price}}</div>
              <div class="col-md-3"><a href="#" >Book Movie</a></div>
              
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

@endsection