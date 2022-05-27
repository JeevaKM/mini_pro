@include('gigsboard.header')
<body>
	<form method="post" action="{{url('updated-user')}}">
		@csrf
    <div class="form-group row">
        @if(isset($Myuser))
    <input class="form-control"  type="hidden" name="id" value="{{$Myuser->id}}"  >
      <div class="col-xs-3">
        <label for="ex1">Name</label>
        <input class="form-control"  type="text" name="name" value="{{$Myuser->name}}" >
      </div>
      <div class="col-xs-3">
        <label for="ex2">Email</label>
        <input class="form-control"  type="text" name="email" value="{{$Myuser->email}}" >
      </div>
      
      <div class="col-xs-3">
        <label for="ex3">Location</label>
        <input class="form-control" type="text" name="location" value="{{$Myuser->location}}" >
      </div>
       
  @endif
 <input class="btn btn-primary active" type="submit" name="">
</form>

</body>
</html>