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

      <div class="row">
       

<!--model class  -->
@if($selected_movie)
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
            <label for="recipient-name" class="col-form-label">Movie Tilte:</label>
            <input type="text" class="form-control" \name="moviename" value="Recipient" readonly="readonly">
          </div></div>
          <div class="col-md-12"><div class="form-group">
            <label for="recipient-name" class="col-form-label">Movie Tilte:</label>
            <input type="text" class="form-control" \name="moviename" value="Recipient" readonly="readonly">
          </div></div>
           <div class="col-md-12"><div class="form-group">
            <label for="recipient-name" class="col-form-label">Movie Tilte:</label>
            <input type="text" class="form-control" \name="moviename" value="Recipient" readonly="readonly">
          </div></div>
          <div class="col-md-12"><div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
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
@endif




<!-- Card Dark -->



@foreach($sheduledmovies as $row)
<div class="card col-md-3">

  <!-- Card image -->
  <div class="view overlay">
    <img class="card-img-top" src="images/ant_man.jpg" alt="Card image cap">
    <a>
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body elegant-color white-text rounded-bottom">

    <!-- Social shares button -->
    <a class="activator waves-effect mr-4"><i class="fa fa-share-alt white-text"></i></a>
    <!-- Title -->
    <h4 class="card-title">{{$row->title}}</h4>
    <hr class="hr-light">
    <!-- Text -->
    <p class="card-text white-text mb-4">Showing on {{$row->date}}</p>
    <!-- Link -->
    <a href="#!" class="white-text d-flex justify-content-end"><h5 data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">View Details <i class="fa fa-angle-double-right"></i></h5></a>

  </div>

</div>
@endforeach




<!-- Card Dark -->

       

      </div>
    </div>

    @endsection