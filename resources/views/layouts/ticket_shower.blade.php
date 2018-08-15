@extends('master.bouncer_master')
@section('content')


<div class="container">
<div class="row">
<div class="jumbotron col-md-12">
    <h1>Today's Schedules</h1>      
  </div>     
</div>

<div class="row">
  <div class="card col-md-3">
  <img class="card-img-top"  src="data:".$qrCode->getContentType()."'base64,'".$qrCode->generate()."" alt="Card image cap">
  {{dd($qrCode)}}
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>




   
  


   


</div>
<br>
<br>
<br>

@endsection('content')
