
@extends('layouts.admin_master')
@section('content')



<div class="container">
  <div class="row">
<div class="jumbotron col-md-12">
    <h1>Manage Movie Library</h1>      
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
@if(!$movie)
<div class="row">
    <button class="btn btn-primary" style="align:left" data-toggle="modal" data-target="#exampleModals">Add New Movie</button>
    </div>
    @endif




   <!--model class  -->

  <div class="modal fade center " id="schedule_button_clicked" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Schdule for Schedule for {{"Movie Title"}} </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          
          <form id="form1" name="form1" method="post" action="{{url('schedules')}}">
            {{csrf_field()}}
          
          
          <input type="hidden" id="movie_id" name="movie_id" value="">
          <div class="form-group col-md-12">
             <div class="col-md-12">
                {{csrf_field()}}
                <label for="message-text" class="col-form-label">Pick a date</label>
                <input class="form-control" type="text" placeholder="Date" name="date" id="datepicker" style="width: 200px">
             </div>
             <div class="">
                <label for="message-text" class="col-form-label">Set Time</label>
             </div>
             <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="Time">Hrs</label>
                  <select id="time_hrs" name="time_hrs" class="form-control">
                    <option selected value="">Hrs</option>
                    <option value="00">00</option>
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputState">Mins</label>
                  <select id="time_min" name="time_min" class="form-control">
                    <option selected value="">Min</option>
                    <option value="00">00</option>
                    <option value="15">15</option>
                    <option value="30">30</option>
                    <option value="45">45</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputZip">AM/PM</label>
                   <select id="time_am_pm" name="time_am_pm" class="form-control">
                    <option value="">AM/PM</option>
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                  </select>
                </div>
              </div>

            </div>

           <div class="col-md-12">
              <label for="message-text" class="col-form-label">Price</label>
              <input type="text" class="form-control" id="movieprice" name="price" value="10000" >
           </div>
          
     
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          <button type="submit" class="btn btn-primary" form="form1" value="Submit">Save Schedule</button>
         
        </div>
      </div>
    </div>
  </div>

 




<div class="modal fade center " id="exampleModals" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
        Select your preferecences</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form 
          id="form2" method="post" enctype="multipart/form-data" action="{{url('add_movies')}}">
            
      
             <div class="col-md-12"><br>
               {{csrf_field()}}
             <label >Movie Title</label>
                   
                 <input type="text" class="form-control" name="title" value="">
            </div>
            <div class="col-md-12"><br>
                
                <label >Movie Type</label> 
                 <select name="type" style="width:100%">
                   <option value="Love">Love</option>
                   <option value="Action">Action</option>
                   <option value="Horror">Horror</option>
                   <option value="Adventure">Adventure</option>
                </select> 
                 </div>
             <div class="col-md-12"><br>
                <label >Baner Image </label><br>
                <input type="file" name="file" id="fileToUpload">
             </div>
              
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <button class="btn btn-primary"type="submit" form="form2" value="Submit">Save Movie</button>

      </div>
    </div>
  </div>
</div>





 @if($movie)
 <div class="row">
  <div class="col-md-8"> 
    <h5 >
        Update your movie</h5>
        <form method="post" enctype="multipart/form-data" action="{{action('MoviesController@update',$id)}}">
    {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH">
      
             <div class="col-md-12"><br>
               
             <label >Movie Title</label>
                   
                 <input type="text" class="form-control" name="title" value="{{$movie->title}}">
            </div>
            <div class="col-md-12"><br>
                
                <label >Movie Type</label> 
                 <select name="type" style="width:100%">
                   <option value="Love">Love</option>
                   <option value="Action">Action</option>
                   <option value="Horror">Horror</option>
                   <option value="Adventure">Adventure</option>
                </select> 
                 </div>
             <div class="col-md-12"><br>
                <label >Baner Image </label><br>
                <a href="{{Storage::url($movie->image_location)}}">View</a><input type="file" name="file" id="fileToUpload" value="">
             </div>
             <div class="col-md-12"><br>
             <button class="btn btn-primary"type="submit" value="Submit">Update Movie</button>
             </div>
              
       </form>

    </div>
   </div>
   @endif
   <br>
   <br>

 <div class="row">
  <div class="col-md-12">   
        
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Movie Tiltle</th>
        <th>Movie Type</th>
        <th>Movie Banner</th>
        <th>Edit</th>
        <th>Add Show Time</th>
        <th>Delete Movie</th>

        
      </tr>
    </thead>

    <tbody>
      @if($movies)

      @foreach($movies as $row)
      <tr>


             
        <td>{{$row->title}}</td>
        <td>{{$row->type}}</td>
        <td><a href="{{Storage::url($row->image_location)}}">Follow link</a></td>
        <td><a href="{{action('MoviesController@edit',$row->id)}}">
          <button type="button" class="btn btn-success" >Edit</button></a></td>
        <td><button 
          movie_id ="{{$row->id}}"
          title="{{$row->title}}" 
          class="btn btn-primary adding_to_schedule" 
          id="{{$row->id}}">Add ShowTime</button></td>

          <td><form method="post" action="{{action('MoviesController@destroy',$row->id)}}">
            {{csrf_field()}}
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn-danger" value="Edit">Delete Movie</button>
    </form> </td>
        

      </tr>

      @endforeach
      @endif
    </tbody>
  </table>
</div>
</div>
<br>
<br>
<br>


</div>


<script type="text/javascript">


 

  

   $( document ).ready(function() 
 {
   

        $(".adding_to_schedule" ).on( "click", function() 
    {
      
      
     // document.getElementById("movie_day").value = this.getAttribute('date');

    
      //document.getElementByClassN("movie_day").value = this.getAttribute('date');
      alert("hello men");
      $('.modal-title').text("Schedule "+this.getAttribute('title'));
      alert(this.getAttribute('movie_id'));
      $('#movie_id').val(this.getAttribute('movie_id'));
      alert($('#movie_id').val());

    
      
      $('#schedule_button_clicked').modal();
      
      

  
    });
  });



</script>
@endsection('content')