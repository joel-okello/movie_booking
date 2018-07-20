



<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>

</head>
<body>
	


</body>
</html>







@extends('layouts.master')
@section('content')
<script type="text/javascript">
	
$('.showhide').click(function() {
    $(this).removeClass('myclass');
    $(this).addClass('showhidenew');
});


$(document).ready(function(){
           

	    $("td").click(function(){
	    	var selected = [];
	  
		    if($(this).hasClass("first"))
		    {
                var this_id = this.getAttribute("id");
           
		    	$(this).removeClass('first');
		    	$(".second").addClass("first");
		    	$(".second").removeClass("second");
		    	document.getElementById("first1").value = "";
		    }

		    else if($(this).hasClass("second"))
		    {
                if(selected.length==2)
                {
                	alert("its full men");
                }
		    	$(this).removeClass('second');
		    	document.getElementById("first2").value = "";
		    }
		     else if($(this).hasClass("third"))
		    {
                
		    	$(this).removeClass('third');
		    	document.getElementById("first2").value = "";
		    }
		    else
		    {
               
		    	if ( $( ".first" ).length )// if the number of elemnts with class first
		    	{
		   

                    if ( $( ".second" ).length )
		    	    {
		    		  
		    		 
		    		  $(this).addClass("second");
		    		  document.getElementById("first2").value = this.getAttribute("id");
		    		}


		    		if ( $( ".third" ).length )
		    	    {
		    		  
		    		  $(".third").removeClass("third");
		    		  $(this).addClass("third");
		    		  document.getElementById("first3").value = this.getAttribute("id");
		    		}

		    		else 
		    		{
		    		  document.getElementById("first2").value = this.getAttribute("id");
		    		  $(this).addClass("second");
		    		}

		    	}

	    		else
	    		{
	    		  document.getElementById("first1").value = this.getAttribute("id");
	    		  $(this).addClass("first");
	    		}
		    }

		 


	    alert("done");
	    });
});

var selected_tds = [];


</script>

<div class="container">
<div class="row">
<div class="jumbotron col-md-12">
    <h1>Check Ticket Schedules</h1>      
  </div>     
</div>




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


   
  <style>
.first {background-color: green;}
.second {background-color: orange;}
.third {background-color: red;}
td   {width: 100px; height: 100px; background-color: blue;}
</style>
   


   <form method="post" enctype="multipart/form-data" action="{{url('seats_option')}}">

      
    
            {{csrf_field()}}
            <input class="form-control" type="text" name="first1" id="first1" readonly="readonly">
             <input class="form-control" type="text" name="first2" id="first2" readonly="readonly">
     
      
        <button type="submit" class="btn btn-success">Submit</button>
  
    </form>

    <table border="1">
			<tr>
				<td id="1">1</td>
				<td id="2">2</td>
				<td id="3">3</td>
		   </tr>
		<tr>
				<td id="4">4</td>
				<td id="5">5</td>
				<td id="6">6</td>
		</tr>
		<tr>
				<td id="7">7</td>
				<td id="8">8</td>
				<td id="9">9</td>
		</tr>
    </table>


</div>
<br>
<br>
<br>

@endsection('content')
