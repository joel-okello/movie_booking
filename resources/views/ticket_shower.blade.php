@extends('layouts.master')
@section('content')


<div class="container">
<div class="row">
<div class="jumbotron col-md-12">
    <h1>Today's Schedules</h1>      
  </div>     
</div>

<div class="row">
	@if($qrCodes)
@foreach($qrCodes as $key=>$qrCode)

  <div class="card col-md-3">
  
  <div class="card-body">
    <h5 class="card-title">
    	<strong>{{'Cinema Booking Online'}}</strong>
    	<br>Movie Ticket
    </h5>
   
    <p class="card-text">This ticket is sheduled for {{$booked_movies[$key]->date. ' at '.$booked_movies[$key]->time}}</p>
    
  </div>
  <img src="data:{{$qrCode->getContentType()}};base64,{{$qrCode->generate()}}" />
  
</div>
@endforeach
@endif
</div>




   
  


   


</div>
<br>
<br>
<br>

@endsection('content')
