
@extends('layouts.master')
@section('content')

<div class="container">
	<div class="row">
<div class="jumbotron col-md-12">
    <h1>Booked Movies</h1>      
  </div>     
</div>
 <div class="row">

        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Movie Title</th>
      <th scope="col">Date </th>
      <th scope="col">StartingTime </th>
      <th scope="col">Sitting Position</th>
      <th scope="col">View Ticket</th>
      <th scope="col">Request Change</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Ant man</th>
      <td>2rd Nov 2018</td>
      <td>7:30 pm</td>
      <td>Back Left</td>
      <td><a href="#" >Click Here</a></td>
      <td><a href="#" >Change preferences</a></td>

    </tr>
  </tbody>
</table>
</div>
</div>
@endsection('content')