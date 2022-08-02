<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="POST" action="{{url('prostore')}}">
		 @csrf
    <div class="form-group row">
    <h1 style="text-align: center;">Welcome to   Page</h1>
     <label for="cars">Choose a category:</label>
       @if(isset($Catagorys)) 
     <select class=""  name="categorie_id" id="categorie_id"  >
     	 <option value="">select</option>
         @foreach($Catagorys as $Catagory)
        
             <option value="{{$Catagory->id}}">{{$Catagory->categorie}}</option>
          @endforeach
         
      </select>
       @endif
      <div class="col-xs-4">
        <label for="ex1">Product</label>
        <input class="" i type="text" name="products" value="{{ old('products')}}" required>
      </div>
      <div class="col-xs-4">
        <label for="ex2">Price</label>
        <input class="" type="text" name="price" value="{{ old('price')}}" required>
      </div>
      <div class="col-xs-4">
        <label for="ex3">qty</label>
        <input class=""  type="text" name="qty" value="{{ old('qty')}}" required>
      </div>
    </div>
    <input class="btn btn-primary active" type="submit" name="">
</form>

</body>
</html>