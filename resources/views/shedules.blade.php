@extends('layouts.admin_master')
@section('content')


<div class="container">
<div class="row">
<div class="jumbotron col-md-12">
    <h1>Movie Schedules</h1>      
  </div>     
</div>




<div class="float-right shedule">
  <a type="button" href="{{url('show_schedule')}}"class="btn btn-primary adding_new" >New Shedule</a>
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

<div class="row lead">
      <div class="col-md-2">Date</div>
      <div class="col-md-2">Time</div>
      <div class="col-md-3">Movie Title</div>
      <div class="col-md-2"> Price</div>
      <div class="col-md-1">Edit</div>
      

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
          <option value="">Select movie </option>
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
        <button type="submit" class="btn btn-success">Add</button>
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
        <button type="submit" class="btn btn-success">Update</button>
    </div>
    
    </div>
    </form>
    @endif


    <table class="table table-striped table-hover">

       
       @if($sheduledmovies)
       @foreach($sheduledmovies as $row)
        <tr >
            <td>{{$row->date}}</td>
            <td>{{$row->time}}</td>
            <td>{{$row->title}}</td>
            <td>{{$row->price}}</td>
            <td>
             <a href="{{action('SheduleController@edit',$row->id)}}">Edit</a>
            </td>
            

          </tr>
          @endforeach 
          @endif
          
    </table>
   


</div>
<br>
<br>
<br>

@endsection('content')
