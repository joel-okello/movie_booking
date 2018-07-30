
@extends('layouts.master')
@section('content')

<div class="container">
	<div class="row">
<div class="jumbotron col-md-12">
    <h1>Booked Movies</h1>      
  </div>     
</div>
<div class="row">
  <div class="col-md-12"> 
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
    </div>
  </div>





<table class="table table-striped table-hover">
     <thead> 
      <th >Movie Title</th>
      <th >Date</th>
      <th>StartingTime </th>
      <th>Ticket Number</th>
      <th>Number of Booked Seats</th>
      <th>Sitting Position</th>
      <th>Ticket Status</th>

      
      
      
    </thead>
     
@if($booked_movies)
@foreach($booked_movies as $row)
        <tr >
            <td>{{$row->title}}</td>
            <td>{{$row->date}}</td>
            <td>{{$row->time}}</td>
            <td>{{$row->ticket_number}}</td>
            <td>{{$row->number_of_seats}}</td>
            <td>{{$row->first_seat_option}}</td>
            <td>{{$row->status}}</td>
            

          </tr>
       
    
 @endforeach
 @endif

 </table>
</div>
</div>
@endsection('content')