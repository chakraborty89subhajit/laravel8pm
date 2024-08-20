<html>
	
<head>form</head>
<body>
	<form action="{{ url('/formsubmit') }}" method="post" enctype="multipart/Form-data">
		{{@csrf_field()}}
		<table border="1">
		<tr><td>first name:</td>
		<td><input type="text" name="first_name" value="{{old('first_name')}}"/>
         @error('first_name')
         {{$message}}
         @enderror

		</td></tr>
		<tr><td>last name:</td>
		<td><input type="text" name="last_name" value="{{old('last_name')}}"/>

          @error('last_name')
         {{$message}}
         @enderror

		</td></tr>
		<tr><td>email:</td>
		<td><input type="text" name="email" value="{{old('email')}}"/>

         @error('email')
         {{$message}}
         @enderror
		</td></tr>

		<tr>
			<td>image:</td>
			<td><input type="file" name="doc"/>
				 @error('doc')
         {{$message}}
         @enderror
			</td></tr>
		
		<tr><td><input type="submit" value="submit"/></td></tr>
		</table>
	</form>
</body>

</html>