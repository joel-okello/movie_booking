@extends('layouts.bouncer_master')
@section('content')


<div class="container">
<div class="row">
<div class="jumbotron col-md-12">
    <h1>Check Ticket Schedules</h1>      
  </div>     
</div>




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


   
  


    <table class="table table-striped table-hover">

       
     
        <tr>
            <td>Enter Ticket Number</td>
            <td>
             <input type="text" id="ticket_number" name="ticket_number">
            </td>
            <td>
             <button type="submit_ticket_number" id="submit_ticket_number" name="submit_ticket_number">Check</button>
            </td>


          </tr>
          <tr id="ticket_passed">
            <td><i class="fa fa-check"></i><h1> Ticket OK</h1></td>
            <td id="ticket_number_passed"></td>
            <td id="number__of_booked_tickets"></td>
          </tr>
          <tr id="ticket_failed">
            <td><i class="fa fa-times"></i><h1> Ticket Failed</h1></td>
            <td id="ticket_number_failed"></td>
            <td id="number__of_booked_tickets"></td>
          </tr>
          
          
    </table>
   


</div>
<br>
<br>
<br>

@endsection('content')
