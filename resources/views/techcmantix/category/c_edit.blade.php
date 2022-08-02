<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body> 
	<form method="post" action="{{url('c_update')}}">
		@csrf
		<input type="text" name="category">
		<input type="submit" name="">
	</form>

</body>
</html>