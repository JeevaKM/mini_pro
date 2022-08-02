<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	@if($errors->any())
	    <ul>
	    	{!! implode('',$errors->all('<li>:message</li>')) !!}
	    </ul>
	  @endif
 <form method="POST" action="{{'authenticate'}}">
 	@csrf
 	<input type="text" name="email">
 	<input type="text" name="password">
 	<input type="submit" value="login" >
 	

 </form>
</body>
</html>