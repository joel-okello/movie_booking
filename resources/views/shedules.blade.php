@extends('layouts.master')
@section('content')


<div class="container">
<div class="row">
<div class="jumbotron col-md-12">
    <h1>Movie Schedules</h1>      
  </div>     
</div>
<div class="row">

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Date </th>
      <th scope="col">Movie Title</th>
      <th scope="col">Starting Time </th>
      <th scope="col">Price</th>
      <th scopre="col">Add burner</th>
      <th scope="col">Edit </th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row" rowspan="7">Monday</th>
      <td>Museveni Must Leave, Part 3</td>
      <td>10:00 am</td>
      <td> 10,000/=</td>
      <td>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Choose Image</label>
        </div>
      </td>
      <td><button type="button" class="btn btn-success">Edit Details</button></td>
      <td><button type="button" class="btn btn-danger">Delete</button></td>

    </tr>

    <tr>
       <td>Museveni Must Leave, Part 3</td>
      <td>12:00 am</td>
      <td> 10,000/=</td>
      <td>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Choose Image</label>
        </div>
      </td>
      <td><button type="button" class="btn btn-success">Edit Details</button></td>
      <td><button type="button" class="btn btn-danger">Delete</button></td>

    </tr>
    <tr>
       <td>Museveni Must Leave, Part 3</td>
      <td>12:00 am</td>
      <td> 10,000/=</td>
      <td>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Choose Image</label>
        </div>
      </td>
      <td><button type="button" class="btn btn-success">Edit Details</button></td>
      <td><button type="button" class="btn btn-danger">Delete</button></td>

    </tr>

    <tr>
       <td><select class="js-example-basic-single" name="state">
  <option value="AL">Alabama</option>
  <option value="WY">Wyoming</option>
</select></td>
      <td><select class="custom-select">
  <option selected>Start Time</option>
  <option value="1">10:00am</option>
  <option value="2">12:00am</option>
  <option value="3">2:00pm</option>
  <option value="3">6:00pm</option>
  <option value="3">10:00pm</option>
</select></td>
      <td><input class="form-control" type="text" placeholder="Price"></td>
      <td>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">Choose Image</label>
        </div>
      </td>
      <td colspan="2"><button type="button" class="btn btn-success">Add Movie</button></td>
      

    </tr>

    
  </tbody>
</table>


</div>
</div>
@endsection('content')