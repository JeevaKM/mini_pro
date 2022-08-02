<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <form method="POST" action="{{url('catstory')}}">
		 @csrf
		  <input type="text" name="category" value="{{ old('category')}}" required>
		  <input type="submit" name="">
	    </form>
	  
</body>
</html>
