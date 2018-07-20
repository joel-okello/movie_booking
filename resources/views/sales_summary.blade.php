 @extends('layouts.admin_master')
@section('content')

<div class="container">

<div class="row">
   <div class="jumbotron col-md-12">



   

    <h1>Sales summary for all shows</h1>

  </div>     
</div>
<div class="row">
  
 <table class="table table-striped">
  <thead>
    <tr>
      <th>Show Date</th>
      <th>Movie Title</th>
      <th>Movie Price</th>
      <th>Show Time</th>
      <th>Number of Sold Seats</th>
      <th>Total Returns</th>

    </tr>
  </thead>
  <tbody>

   @foreach($sales_info as $show)
    <tr>
      <td>{{$show->date}}</td>
      <td>{{$show->title}}</td>
      <td>{{$show->price}}</td>
      <td>{{$show->time}}</td>
      <td>{{$show->seats_sold}}</td>
      <td>{{$show->seats_sold*$show->price}}</td>
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