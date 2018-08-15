@extends('layouts.master')
@section('content')


    <!-- Page Content -->
<div class="container">
  <div class="row jumbotron mt-2 ">
 
    <div class="col-md-6 ">
      <h3>Book now get off the hustle</h3>       
      <form  action="{{url('show_serched_movies_on_shedule')}}" method="post">
           {{csrf_field()}}
           
            <div class="input-group input-group-lg">
              <input class="form-control" type="text" placeholder="Search title">
     
              <button type="submit" class="btn btn-primary">Search</button>
            </div>
          
        </form>
        </div>
     @auth
        <div class="col-md-6 ">
          <span float="right">
          @if(App\User::has_booked_movies())
          <strong></strong>

    
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>You have some Tickets</strong> 
      Check <a href="{{url('show_ticket')}}">here </a>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
          @endif
          </span>
        </div>

        @endauth
    </div>     
 

        
         

 




  <!-- Card Dark -->

  <div class="row">

  @foreach($sheduledmovies as $row)
  <div class="card col-md-3" >

    <!-- Card image -->
    <div class="view overlay">
      <a href="{{action('SheduleController@view_details',$row->id)}}">
      <img class="card-img-top" style="height:200px" src="{{Storage::url($row->image_location)}}" 
           alt="Card image cap"></a>
      <a>
        <div class="mask rgba-white-slight">
          
        </div>
      </a>
    </div>

    <!-- Card content -->
    <div class="card-body elegant-color white-text rounded-bottom">

      <!-- Social shares button -->
      
        <a  class="activator waves-effect mr-4">
           <i class="fa fa-share-alt white-text">
           </i>
        </a>
        <!-- Title -->
        <a href="{{action('SheduleController@view_details',$row->id)}}"><h4 class="card-title">{{$row->title}}</h4></a>
        <hr class="hr-light">
        <!-- Text -->
        <p class="card-text white-text mb-4">Showing on 
            @foreach($row->dates as $date)
            {{$date->format('l').". "}}
            @endforeach
        </p>

        <p>
          More Details
        </p>
        <!-- Link -->
        <a href="{{action('SheduleController@view_details',$row->id)}}" class="white-text d-flex justify-content-center btn btn-primary">
          
              Book Ticket
         
        </a>

    </div>

  </div>
  @endforeach
  </div>      
</div>
</br>
</br>
<div class="clearfix"></div>

@endsection