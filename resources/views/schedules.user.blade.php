@extends('layouts.master')
@section('content')


<div class="container">
<div class="row">
<div class="jumbotron col-md-12">
    <h1>Movie Schedules</h1>      
  </div>     
</div>




<div class="float-right shedule">
  <a type="button" href="{{url('new_shedules')}}"class="btn btn-primary adding_new" >New Shedule</a>
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
    </div>
  







    <table class="table table-striped table-hover">

       
       @if($sheduledmovies)
       @foreach($sheduledmovies as $row)
        <tr >
            <td>{{$row->date}}</td>
            <td>{{$row->time}}</td>
            <td>{{$row->title}}</td>
            <td>{{$row->price}}</td>
            

          </tr>
          @endforeach 
          @endif
          
    </table>
   


</div>
<br>
<br>
<br>

@endsection('content')
