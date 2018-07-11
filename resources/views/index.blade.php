@extends('layouts.master')
@section('content')


    <!-- Page Content -->
    <div class="container">

<div class="row md-12">
<div class="jumbotron col-md-12">
    <h1>Book now get off the hustle</h1>       
    <form >
         <div class="col-md-6 col-md-offset-3">
          <div class="input-group input-group-lg">
            <input class="form-control" placeholder="Search" type="text">
   
            <button type="submit" class="btn btn-primary">Find</button>
          </div>
        </div>
      </form>
  </div>     
</div>

      <div class="row">
       

<!--model class  -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Movie Title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>





<!-- Card Dark -->

<div class="card col-md-3">

  <!-- Card image -->
  <div class="view overlay">
    <img class="card-img-top" src="images/ant_man.jpg" alt="Card image cap">
    <a>
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body elegant-color white-text rounded-bottom">

    <!-- Social shares button -->
    <a class="activator waves-effect mr-4"><i class="fa fa-share-alt white-text"></i></a>
    <!-- Title -->
    <h4 class="card-title">Ant man</h4>
    <hr class="hr-light">
    <!-- Text -->
    <p class="card-text white-text mb-4">Showing Tuesday and Monday</p>
    <!-- Link -->
    <a href="#!" class="white-text d-flex justify-content-end"><h5 data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">View Details <i class="fa fa-angle-double-right"></i></h5></a>

  </div>

</div>


<div class="card col-md-3">

  <!-- Card image -->
  <div class="view overlay">
    <img class="card-img-top" src="images/ant_man.jpg" alt="Card image cap">
    <a>
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body elegant-color white-text rounded-bottom">

    <!-- Social shares button -->
    <a class="activator waves-effect mr-4"><i class="fa fa-share-alt white-text"></i></a>
    <!-- Title -->
    <h4 class="card-title">Ant man</h4>
    <hr class="hr-light">
    <!-- Text -->
    <p class="card-text white-text mb-4">Showing Tuesday and Monday</p>
    <!-- Link -->
    <a href="#!" class="white-text d-flex justify-content-end"><h5 data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">View Details <i class="fa fa-angle-double-right"></i></h5></a>

  </div>

</div>


<div class="card col-md-3">

  <!-- Card image -->
  <div class="view overlay">
    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2821%29.jpg" alt="Card image cap">
    <a>
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body elegant-color white-text rounded-bottom">

    <!-- Social shares button -->
    <a class="activator waves-effect mr-4"><i class="fa fa-share-alt white-text"></i></a>
    <!-- Title -->
    <h4 class="card-title">Card title</h4>
    <hr class="hr-light">
    <!-- Text -->
    <p class="card-text white-text mb-4">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <!-- Link -->
    <a href="#!" class="white-text d-flex justify-content-end"><h5>Read more <i class="fa fa-angle-double-right"></i></h5></a>

  </div>

</div>
<div class="card col-md-3">

  <!-- Card image -->
  <div class="view overlay">
    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2821%29.jpg" alt="Card image cap">
    <a>
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body elegant-color white-text rounded-bottom">

    <!-- Social shares button -->
    <a class="activator waves-effect mr-4"><i class="fa fa-share-alt white-text"></i></a>
    <!-- Title -->
    <h4 class="card-title">Card title</h4>
    <hr class="hr-light">
    <!-- Text -->
    <p class="card-text white-text mb-4">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <!-- Link -->
    <a href="#!" class="white-text d-flex justify-content-end"><h5>Read more <i class="fa fa-angle-double-right"></i></h5></a>

  </div>

</div>
<div class="card col-md-3">

  <!-- Card image -->
  <div class="view overlay">
    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2821%29.jpg" alt="Card image cap">
    <a>
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body elegant-color white-text rounded-bottom">

    <!-- Social shares button -->
    <a class="activator waves-effect mr-4"><i class="fa fa-share-alt white-text"></i></a>
    <!-- Title -->
    <h4 class="card-title">Card title</h4>
    <hr class="hr-light">
    <!-- Text -->
    <p class="card-text white-text mb-4">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <!-- Link -->
    <a href="#!" class="white-text d-flex justify-content-end"><h5>Read more <i class="fa fa-angle-double-right"></i></h5></a>

  </div>

</div>
<div class="card col-md-3">

  <!-- Card image -->
  <div class="view overlay">
    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2821%29.jpg" alt="Card image cap">
    <a>
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body elegant-color white-text rounded-bottom">

    <!-- Social shares button -->
    <a class="activator waves-effect mr-4"><i class="fa fa-share-alt white-text"></i></a>
    <!-- Title -->
    <h4 class="card-title">Card title</h4>
    <hr class="hr-light">
    <!-- Text -->
    <p class="card-text white-text mb-4">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <!-- Link -->
    <a href="#!" class="white-text d-flex justify-content-end"><h5>Read more <i class="fa fa-angle-double-right"></i></h5></a>

  </div>

</div>
<div class="card col-md-3">

  <!-- Card image -->
  <div class="view overlay">
    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2821%29.jpg" alt="Card image cap">
    <a>
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body elegant-color white-text rounded-bottom">

    <!-- Social shares button -->
    <a class="activator waves-effect mr-4"><i class="fa fa-share-alt white-text"></i></a>
    <!-- Title -->
    <h4 class="card-title">Card title</h4>
    <hr class="hr-light">
    <!-- Text -->
    <p class="card-text white-text mb-4">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <!-- Link -->
    <a href="#!" class="white-text d-flex justify-content-end"><h5>Read more <i class="fa fa-angle-double-right"></i></h5></a>

  </div>

</div>
<div class="card col-md-3">

  <!-- Card image -->
  <div class="view overlay">
    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2821%29.jpg" alt="Card image cap">
    <a>
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body elegant-color white-text rounded-bottom">

    <!-- Social shares button -->
    <a class="activator waves-effect mr-4"><i class="fa fa-share-alt white-text"></i></a>
    <!-- Title -->
    <h4 class="card-title">Card title</h4>
    <hr class="hr-light">
    <!-- Text -->
    <p class="card-text white-text mb-4">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <!-- Link -->
    <a href="#!" class="white-text d-flex justify-content-end"><h5>Read more <i class="fa fa-angle-double-right"></i></h5></a>

  </div>

</div>
<div class="card col-md-3">

  <!-- Card image -->
  <div class="view overlay">
    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2821%29.jpg" alt="Card image cap">
    <a>
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body elegant-color white-text rounded-bottom">

    <!-- Social shares button -->
    <a class="activator waves-effect mr-4"><i class="fa fa-share-alt white-text"></i></a>
    <!-- Title -->
    <h4 class="card-title">Card title</h4>
    <hr class="hr-light">
    <!-- Text -->
    <p class="card-text white-text mb-4">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <!-- Link -->
    <a href="#!" class="white-text d-flex justify-content-end"><h5>Read more <i class="fa fa-angle-double-right"></i></h5></a>

  </div>

</div>
<div class="card col-md-3">

  <!-- Card image -->
  <div class="view overlay">
    <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%2821%29.jpg" alt="Card image cap">
    <a>
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body elegant-color white-text rounded-bottom">

    <!-- Social shares button -->
    <a class="activator waves-effect mr-4"><i class="fa fa-share-alt white-text"></i></a>
    <!-- Title -->
    <h4 class="card-title">Card title</h4>
    <hr class="hr-light">
    <!-- Text -->
    <p class="card-text white-text mb-4">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <!-- Link -->
    <a href="#!" class="white-text d-flex justify-content-end"><h5>Read more <i class="fa fa-angle-double-right"></i></h5></a>

  </div>

</div>
<!-- Card Dark -->

        <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Type</th>
      <th scope="col">Column heading</th>
      <th scope="col">Column heading</th>
      <th scope="col">Column heading</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table-active">
      <th scope="row">Active</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr>
      <th scope="row">Default</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="table-primary">
      <th scope="row">Primary</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="table-secondary">
      <th scope="row">Secondary</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="table-success">
      <th scope="row">Success</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="table-danger">
      <th scope="row">Danger</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="table-warning">
      <th scope="row">Warning</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="table-info">
      <th scope="row">Info</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="table-light">
      <th scope="row">Light</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="table-dark">
      <th scope="row">Dark</th>
      <td>Column content</td>
      <td><div class="input-group input-daterange">
    <input type="text" class="form-control" value="2012-04-05">
    <div class="input-group-addon">to</div>
    <input type="text" class="form-control" value="2012-04-19">
</div>
</td>
      </tr>
  </tbody>
</table>


 <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Type</th>
      <th scope="col">Column heading</th>
      <th scope="col">Column heading</th>
      <th scope="col">Column heading</th>
    </tr>
  </thead>
  <tbody>
    <tr class="table-active">
      <th scope="row">Active</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr>
      <th scope="row">Default</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="table-primary">
      <th scope="row">Primary</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="table-secondary">
      <th scope="row">Secondary</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="table-success">
      <th scope="row">Success</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="table-danger">
      <th scope="row">Danger</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="table-warning">
      <th scope="row">Warning</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="table-info">
      <th scope="row">Info</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="table-light">
      <th scope="row">Light</th>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="table-dark">
      <th scope="row">Dark</th>
      <td>Column content</td>
      <td><div class="input-group input-daterange">
    <input type="text" class="form-control" value="2012-04-05">
    <div class="input-group-addon">to</div>
    <input type="text" class="form-control" value="2012-04-19">
</div>
</td>
      </tr>
    
  </tbody>
</table>
      </div>
    </div>

    @endsection