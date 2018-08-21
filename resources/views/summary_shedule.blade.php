 @extends('layouts.master')
@section('content')

<div class="container">

<div class="row">
   <div class="jumbotron col-md-12">

    <h1>Schedule summary for all movies</h1>

  </div>     
</div>
<div class="row">
 <table class="table table-striped">
  <thead>
    <tr>

      <th scope="col">Movie</th>
      @foreach($all_dates_in_range as $date )
      <th scope="col">{{$date->format('l')}} {{$date->format('Y-m-d')}}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach($movies as $key => $movie)
    <tr>
      <th class="movie_on_day"  movie="{{$movie->id}}">
        <a href="{{action('SheduleController@view_details',$movie->id)}}">{{$movie->title}}</a>
      </th>
      @foreach($all_dates_in_range as $key_for_date => $date)
      @if($schedule_for_dates[$key][$key_for_date])
      {{dd($schedule_for_dates)}}
      
      <td ><button class="btn btn-link movie_that_day" date="{{$all_dates_in_range[$key_for_date]->format('Y-m-d')}}" movie="{{$movie->id}}">{{$all_dates_in_range[$key_for_date]->format('l')}} </button></td>
      
      @else
      <td></td>
      @endif
      @endforeach

    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>


<script type="text/javascript">
  
  $(function() {
      $(".movie_that_day").on("click",function(){


  alert(this.getAttribute("date")+" "+this.getAttribute("movie"));

      });        



  })
</script>

@endsection('content')