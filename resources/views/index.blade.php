@extends('layouts.master')
@section('content')


    <!-- Page Content -->
<div class="container">
  <div class="row md-12">
  <div class="jumbotron col-md-12">
      <h1>Book now get off the hustle</h1>       
      <form  action="{{url('show_serched_movies_on_shedule')}}" method="post">
           {{csrf_field()}}
           <div class="col-md-6 col-md-offset-3">
            <div class="input-group input-group-lg">
              <input class="form-control" type="text" placeholder="Search..">
     
              <button type="submit" class="btn btn-primary">Find</button>
            </div>
          </div>
        </form>
    </div>     
  </div>

        
         

 




  <!-- Card Dark -->

  <div class="row">

  @foreach($sheduledmovies as $row)
  <div class="card col-md-3" >

    <!-- Card image -->
    <div class="view overlay">
      <img class="card-img-top" style="height:200px" src="{{$row->image_location}}" 
           alt="Card image cap">
      <a>
        <div class="mask rgba-white-slight">
          
        </div>
      </a>
    </div>

    <!-- Card content -->
    <div class="card-body elegant-color white-text rounded-bottom">

      <!-- Social shares button -->
        <a class="activator waves-effect mr-4">
           <i class="fa fa-share-alt white-text">
           </i>
        </a>
        <!-- Title -->
        <h4 class="card-title">{{$row->title}}</h4>
        <hr class="hr-light">
        <!-- Text -->
        <p class="card-text white-text mb-4">Showing on 
            @foreach($row->dates as $date)
            {{$date->format('l').". "}}
            @endforeach
        </p>
        <!-- Link -->
        <a href="{{action('SheduleController@view_details',$row->id)}}" class="white-text d-flex justify-content-end">
          <h5 >
              View Details 
          </h5>
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