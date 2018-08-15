



<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<style>
.first {background-color: green;}
.second   {color: orange;}
td   {width: 30px; height: 30px}
</style>

<script type="text/javascript">
	
$('.showhide').click(function() {
    $(this).removeClass('myclass');
    $(this).addClass('showhidenew');
});


$(document).ready(function(){
    $("td").click(function(){
        if(this.title!=""){
            alert(this.title);
        }
    });
});



</script>


  <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset('js/jquery-min.js') }}"></script>
    <script src="{{ asset('select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/zebra_datepicker.min.js') }}"></script>
 
     <script src="{{ asset('js/popper.js/1.14.3/umd/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
   
</head>
<body>
	<table>
			<tr>
			  <td></td>
			  <td></td>
			   <td></td>
			</tr>
			<tr>
			   <td></td>
			   <td></td>
			    <td></td>
			</tr>
			<tr>
			    <td></td>
			    <td></td>
			    <td></td>
			</tr>
			</table>


</body>
</html>






