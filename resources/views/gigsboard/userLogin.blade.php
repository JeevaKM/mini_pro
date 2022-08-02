<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	
	@if($errors->any())
	    <ul>
	    	{!! implode('',$errors->all('<li>:message</li>')) !!}
	    </ul>
	  @endif
 <form method="POST" action="{{'authenticate'}}">
 	@csrf
 	<div class="form-group">
 	<input type="text"  name="email">
 </div>
 <div class="form-group">
 	<input type="text"  name="password">
 </div>

 	<input type="submit"  class="btn btn-primary btn-lg" value="login" >
 	<br>
 	<a class="navbar-brand" href="{{url('index')}}">Register</a>

 </form>
</body>
</html>