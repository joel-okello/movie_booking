<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bare - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->


    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <script src="{{ asset('js/jquery-min.js') }}"></script>
    <script src="{{ asset('select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/zebra_datepicker.min.js') }}"></script>
 
     <script src="{{ asset('js/popper.js/1.14.3/umd/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
   


    
    


    <!-- Custom styles for this template -->
    <style>
      body {
        padding-top: 54px;
      }
      @media (min-width: 992px) {
        body {
          padding-top: 56px;
        }
      }

    </style>

  </head>

  <body>

<div class="container">
  <div class="row md-12">
  <div class="jumbotron col-md-12">
            
      
           <div class="col-md-6 col-md-offset-3">
            
          </div>
        
    </div>     
  </div>
	<form action="check_form1" method="get">
		{{csrf_field()}}


		Favarite Sports<br>
		
		<label for="basket">Basket</label><input type="radio" name="sport" id="basket" value="basket"><br>
		<label for="football">Football</label><input type="radio" name="sport" id="football" value="football"><br>

		Your likes<br>
                     
		<label for="mangoes">Mangoes</label><input type="checkbox" name="mangoes" id="mangoes"  ><br>
		<label for="guavas">Guavass</label><input type="checkbox" name="guavas" id="guavas" >
    <br>
		<label for="bears">Bears</label><input type="checkbox" name="bears" id="bears" ><br>
		<label for="oranges">Oranges</label><input type="checkbox" name="oranges" id="oranges" ><br>


		<button type="submit" class="btn btn-primary"  value="Submit">Save</button>

	</form>
</body>


</html>





