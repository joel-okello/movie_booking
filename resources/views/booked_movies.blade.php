
@extends('layouts.master')
@section('content')

<div class="container">
	<div class="row">
<div class="jumbotron col-md-12">
    <h1>Booked Movies</h1>      
  </div>     
</div>

<div class="row lead" style="background-color: #e6e6ef;">
      <div class="col-md-2">Movie Title</div>
      <div class="col-md-2">Date</div>
      <div class="col-md-2">StartingTime </div>
      <div class="col-md-2">Sitting Position</div>
      <div class="col-md-2">View Ticket</div>
      <div class="col-md-2">Request Change</div>
      
    </div>
 @if($booked_movies)
@foreach ($booked_movies as $row)
<div class="row">
      <div class="col-md-2">{{$row->title}}</div>
      <div class="col-md-2">{{$row->Date}}</div>
      <div class="col-md-2">{{$row->Date}}</div>
      <div class="col-md-2"> Left Right</div>
      <div class="col-md-2"><a href="#" >Click Here</a></div>
      <div class="col-md-2"><a href="#" >Request Change</a></div>
      
    </div>
 @endforeach
 @endif
</div>
</div>
@endsection('content')