@extends('layouts.master')
@section('content')


<div class="container">
<div class="row">
<div class="jumbotron col-md-12">
    <h1>Movie Schedules</h1>      
  </div>     
</div>




<div class="float-right"><button type="button" class="btn btn-primary" >Shedule More Movies</button></div>
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

<div class="row lead">
      <div class="col-md-2">Date</div>
      <div class="col-md-2">Time</div>
      <div class="col-md-3">Movie Title</div>
      <div class="col-md-2"> Price</div>
      <div class="col-md-1">Edit</div>
      <div class="col-md-2">Delete</div>

    </div>

    <form method="post" enctype="multipart/form-data" action="{{url('schedules')}}">
    <div class="row" id="adding_to_shedule">
      
      <div class="col-md-2">
            {{csrf_field()}}
            <input class="form-control" type="text" placeholder="Date" name="date" id="datepicker">
     </div>
       <div class="col-md-2">
        <select class="custom-select" name="time" style="padding:0px">
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

          @foreach($available_movies_to_add as $movie)
          <option value="{{$movie->id}}">{{$movie->title}}</option>
          @endforeach
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

 @foreach($sheduledmovies as $row)
<div class="row">
      <div class="col-md-2">{{$row->date}}</div>
      <div class="col-md-2">{{$row->time}}</div>
      <div class="col-md-3">{{$row->title}}</div>
      <div class="col-md-2">{{$row->price}}</div>
      <div class="col-md-1"><button type="button" class="btn btn-success">Edit</button></div>
      <div class="col-md-2"><button type="button" class="btn btn-danger">Delete</button></div>

    </div>
   
@endforeach 

    

    


    



</div>
</div>


@endsection('content')