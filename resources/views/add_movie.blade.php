
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
          id="form1" method="post" enctype="multipart/form-data" action="{{url('add_movies')}}">
            
      
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

        <button class="btn btn-primary"type="submit" form="form1" value="Submit">Save Movie</button>

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
in
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
                <a href="{{$movie->image_location}}">View</a><input type="file" name="file" id="fileToUpload" value="">
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
        <th>Add to Schedule</th>

        
      </tr>
    </thead>

    <tbody>
      @if($movies)

      @foreach($movies as $row)
      <tr>


             
        <td>{{$row->title}}</td>
        <td>{{$row->type}}</td>
        <td><a href="{{$row->image_location}}">Follow link</a></td>
        <td><a href="{{action('MoviesController@edit',$row->id)}}">
          <button type="button" class="btn btn-success" >Edit</button></a></td>
        <td><a href="{{url('new_shedules',$row->id)}}">
          <button type="button" class="btn btn-success">Add to Schedule</button></a></td>
        

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
@endsection('content')