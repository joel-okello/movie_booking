@extends('layouts.bouncer_master')
@section('content')


<div class="container">
<div class="row">
<div class="jumbotron col-md-12">
    <h1>Today's Schedules</h1>      
  </div>     
</div>

@if(isset($varname))
{{dd(Session::all(),$varname)}}
@endif

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


   
  


    <table class="table table-striped table-hover" id="table">
        <thead>
          <th>Movie Title</th>
          <th>Movie Date</th>
          <th>Movie Time</th>
          
        </thead>
       
       @if($today_schedule)
       @foreach($today_schedule as $row)
        <tr >
            <td>{{$row->title}}</td>
            <td>{{$row->date}}</td>
            <td>{{$row->time}}</td>
            

          </tr>
          @endforeach 
          @endif
          
    </table>
   


</div>
<br>
<br>
<br>

@endsection('content')
