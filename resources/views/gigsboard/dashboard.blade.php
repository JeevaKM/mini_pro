

	<body>
	    <form method="POST" action="{{url('insert-user')}}">
		 @csrf
		    <div class="form-group row">
		    <h1 style="text-align: center;">Welcome to   Page</h1>
		      <div class="col-xs-4">
		        <label for="ex1">User</label>
		        <input class="form-control" id="ex1" type="text" name="name" value="{{ old('name')}}" required>
		      </div>
		      <div class="col-xs-4">
		        <label for="ex2">Email</label>
		        <input class="form-control" id="ex2" type="text" name="email" value="{{ old('email')}}" required>
		      </div>
		      <div class="col-xs-4">
		        <label for="ex2">Password</label>
		        <input class="form-control" id="ex2" type="text" name="password" value="{{ old('password')}}" required>
		      </div>
		      <div class="col-xs-4">
		        <label for="ex3">Location</label>
		        <input class="form-control" id="ex3" type="text" name="location" value="{{ old('location')}}" required>
		      </div>
		    </div>
		    <input class="btn btn-primary active" type="submit" name="">
	    </form>
	  
    <div style="padding-top: 3%;">
		 @if(isset($Myuser))
        <table class="table">
		  <thead class="table-primary" >
		    <tr>
		      <th>Name</th>
		      <th>email</th>
		      <th>location</th>
		      <th>view</th>
		      <th>Delete</th>
		     </tr>
		  </thead>
		  <tbody>
		     @foreach($Myuser as $Myusers)
		    <tr>
		      <td style='font-size:26px'>{{$Myusers->name}}</td>
		      <td style='font-size:26px'>{{$Myusers->email}}</td>
		      <td style='font-size:26px'>{{$Myusers->location}}</td>
		      <td><a  href="{{ url('update-user/'.$Myusers->id)}}"><i class='fas fa-edit' style='font-size:26px'></i></a></td>
		      <td><a  href="{{ url('user-delete/'.$Myusers->id)}}"> <i class='far fa-trash-alt' style='font-size:26px'></i></a></td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		@endif  
	  </div>
	</body>
	 <div> @if ($errors->any())
	       <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
	        </div>
	      @endif
	      @if (session('insert'))
	        <div class="alert alert-success">
	            <ul>
	               <li><h3>{{ session('insert') }}<h3></li>
	            </ul>
	        </div>
	        @endif
	         @if (session('update'))
	        <div class="alert alert-success">
	            <ul>
	               <li><h3>{{ session('update') }}</h3></li>
	            </ul>
	        </div>
	        @endif
	         @if (session('delete'))
	        <div class="alert alert-success">
	            <ul>
	               <li><h3>{{ session('delete') }}<h3></li>
	            </ul>
	        </div>
	        @endif</div>
</html>